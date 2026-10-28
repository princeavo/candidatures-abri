<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Attachment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    /**
     * Display the multi-step application form.
     */
    public function create(): View
    {
        return view('applications.create');
    }

    /**
     * Store a newly submitted application and its attachments.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'candidacy_type' => ['required', 'string'],
            'first_name' => ['required', 'string', 'max:120'],
            'last_name' => ['required', 'string', 'max:120'],
            'gender' => ['required', 'string'],
            'date_of_birth' => ['required', 'date'],
            'nationality' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:32'],
            'email' => ['required', 'email', 'max:180'],
            'profession' => ['nullable', 'string', 'max:120'],
            'organization' => ['nullable', 'string', 'max:180'],
            'department' => ['nullable', 'string', 'max:64'],
            'municipality' => ['nullable', 'string', 'max:64'],
            'invention_name' => ['required', 'string', 'max:255'],
            'sector' => ['required', 'string', 'max:120'],
            'summary' => ['nullable', 'string'],
        ]);

        return DB::transaction(function () use ($request, $validated) {
            $nextId = (Application::max('id') ?? 0) + 1;
            $referenceCode = sprintf('BJ-ABRI-2026-%04d', $nextId);
            $uuid = (string) Str::uuid();

            // File keys list
            $fileKeys = [
                'nationality_proof',
                'id_photo',
                'group_agreement',
                'authorization_proof',
                'traditional_knowledge_proof',
                'invention_photo_1',
                'invention_photo_2',
                'invention_photo_3',
                'scientific_validation_proof',
                'real_world_testing_proof',
                'commercialization_proof',
                'commercial_proof',
                'partnerships_proof',
                'exhibition_proof',
                'event_fair_proof',
                'event_tech_day_proof',
                'ip_proof',
                'valorization_proof',
                'licensing_proof',
                'social_impact_proof',
                'environmental_impact_proof',
            ];

            // Extract all answers into structured JSON payload
            $formData = $request->except(array_merge([
                '_token',
                'first_name',
                'last_name',
                'gender',
                'date_of_birth',
                'nationality',
                'phone',
                'email',
                'profession',
                'organization',
                'department',
                'municipality',
                'invention_name',
                'sector',
                'summary',
                'candidacy_type',
            ], $fileKeys));

            $application = Application::create([
                'uuid' => $uuid,
                'reference_code' => $referenceCode,
                'candidacy_type' => $validated['candidacy_type'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'gender' => $validated['gender'],
                'date_of_birth' => $validated['date_of_birth'],
                'nationality' => $validated['nationality'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'profession' => $validated['profession'] ?? null,
                'organization' => $validated['organization'] ?? null,
                'department' => $validated['department'] ?? null,
                'municipality' => $validated['municipality'] ?? null,
                'invention_name' => $validated['invention_name'],
                'sector' => $validated['sector'],
                'summary' => $validated['summary'] ?? null,
                'form_data' => $formData,
                'submitted_at' => now(),
            ]);

            foreach ($fileKeys as $fileKey) {
                if ($request->hasFile($fileKey) && $request->file($fileKey)->isValid()) {
                    $file = $request->file($fileKey);
                    $path = $file->store("candidatures/{$uuid}", 'local');

                    Attachment::create([
                        'application_id' => $application->id,
                        'type' => $fileKey,
                        'original_name' => $file->getClientOriginalName(),
                        'storage_path' => $path,
                        'mime_type' => $file->getClientMimeType(),
                        'size_bytes' => $file->getSize(),
                    ]);
                }
            }

            return redirect()->route('applications.confirmation', ['reference' => $referenceCode]);
        });
    }

    /**
     * Display the confirmation screen after successful submission.
     */
    public function confirmation(string $reference): View
    {
        $application = Application::where('reference_code', $reference)->firstOrFail();

        return view('applications.confirmation', compact('application'));
    }
}
