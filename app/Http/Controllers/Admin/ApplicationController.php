<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ApplicationController extends Controller
{
    /**
     * Display a listing of submitted applications with search and filters.
     */
    public function index(Request $request): View
    {
        $query = Application::query()->withCount('attachments')->latest('submitted_at');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('reference_code', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('invention_name', 'like', "%{$search}%");
            });
        }

        if ($sector = $request->input('sector')) {
            $query->where('sector', $sector);
        }

        if ($department = $request->input('department')) {
            $query->where('department', $department);
        }

        $applications = $query->paginate(15)->withQueryString();

        $sectors = Application::distinct()->pluck('sector')->filter()->values();
        $departments = Application::distinct()->pluck('department')->filter()->values();
        $totalCount = Application::count();

        return view('admin.applications.index', compact('applications', 'sectors', 'departments', 'totalCount'));
    }

    /**
     * Display the specified application details.
     */
    public function show(Application $application): View
    {
        $application->load('attachments');

        return view('admin.applications.show', compact('application'));
    }

    /**
     * Download an uploaded attachment securely.
     */
    public function downloadAttachment(Attachment $attachment): BinaryFileResponse
    {
        $path = Storage::disk('local')->path($attachment->storage_path);

        if (!file_exists($path)) {
            abort(404, 'Le fichier demandé est introuvable.');
        }

        return response()->download($path, $attachment->original_name);
    }

    /**
     * Export all applications to a clean CSV file with UTF-8 BOM for Excel.
     */
    public function exportCsv(): StreamedResponse
    {
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="candidatures-abri-2026-' . date('Y-m-d-His') . '.csv"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');
            
            // UTF-8 BOM for Microsoft Excel compatibility
            fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($handle, [
                'N° Référence',
                'Type Candidat',
                'Nom',
                'Prénoms',
                'Sexe',
                'Date de Naissance',
                'Nationalité',
                'Pays de Résidence',
                'Téléphone',
                'Email',
                'Département',
                'Commune',
                'Structure',
                'Titre de l\'Invention',
                'Type d\'Invention',
                'Secteur',
                'Stade Maturité',
                'Utilisation IA',
                'Droits PI',
                'Nombre de Pièces Jointes',
                'Date de Dépôt',
            ], ';');

            Application::withCount('attachments')->chunk(100, function ($applications) use ($handle) {
                foreach ($applications as $app) {
                    $formData = is_array($app->form_data) ? $app->form_data : [];
                    $country = $formData['country_of_residence'] ?? 'Bénin';
                    if ($country === 'Autre' && !empty($formData['country_of_residence_other'])) {
                        $country .= ' (' . $formData['country_of_residence_other'] . ')';
                    }
                    $invType = $formData['invention_type'] ?? '';
                    $trl = $formData['trl_stage'] ?? '';
                    $usedAi = $formData['used_ai_tools'] ?? '';
                    $ipTypes = isset($formData['ip_types']) && is_array($formData['ip_types']) ? implode(', ', $formData['ip_types']) : '';

                    fputcsv($handle, [
                        $app->reference_code,
                        $app->candidacy_type,
                        $app->last_name,
                        $app->first_name,
                        $app->gender,
                        $app->date_of_birth?->format('d/m/Y') ?? '',
                        $app->nationality,
                        $country,
                        $app->phone,
                        $app->email,
                        $app->department ?? '',
                        $app->municipality ?? '',
                        $app->organization ?? '',
                        $app->invention_name,
                        $invType,
                        $app->sector,
                        $trl,
                        $usedAi,
                        $ipTypes,
                        (string) $app->attachments_count,
                        $app->submitted_at?->format('d/m/Y H:i') ?? '',
                    ], ';');
                }
            });

            fclose($handle);
        }, 200, $headers);
    }
}
