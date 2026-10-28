@extends('layouts.app')

@section('title', 'Dossier ' . $application->reference_code . ' | ABRI 2026')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-4 border-b border-[#E2DBCB]">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.applications.index') }}" class="w-9 h-9 rounded-xl border border-[#c0c8c3] text-[#52625A] hover:bg-[#f1eee5] flex items-center justify-center transition-colors">
                <span class="material-symbols-outlined text-lg">arrow_back</span>
            </a>
            <div>
                <span class="text-xs font-mono uppercase tracking-wider text-[#006c4f] font-bold">{{ $application->reference_code }}</span>
                <h1 class="font-heading text-2xl font-bold text-[#001e14]">{{ $application->invention_name }}</h1>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <button onclick="window.print()" class="px-3.5 py-2 rounded-xl border border-[#c0c8c3] text-xs font-semibold text-[#52625A] hover:bg-[#f1eee5] transition-colors flex items-center gap-1.5">
                <span class="material-symbols-outlined text-base">print</span>
                <span>Imprimer la fiche</span>
            </button>
        </div>
    </div>

    <!-- Dossier Detail Card -->
    <div class="bg-white rounded-2xl border border-[#E2DBCB] shadow-xs p-6 sm:p-10 space-y-8">
        
        <!-- Section 1: Candidate Identity -->
        <div class="space-y-4">
            <h2 class="font-heading text-base font-bold text-[#063527] border-b border-[#f1eee5] pb-2 flex items-center gap-2">
                <span class="material-symbols-outlined text-lg">person</span>
                <span>1. Informations du Candidat</span>
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                <div class="bg-[#f7f3ea]/60 p-3 rounded-xl border border-[#E2DBCB]">
                    <span class="text-[#52625A] uppercase tracking-wider text-[10px] font-semibold">Nom complet</span>
                    <div class="font-bold text-[#1c1c16] text-sm mt-0.5">{{ $application->first_name }} {{ $application->last_name }}</div>
                </div>
                <div class="bg-[#f7f3ea]/60 p-3 rounded-xl border border-[#E2DBCB]">
                    <span class="text-[#52625A] uppercase tracking-wider text-[10px] font-semibold">Sexe / Date de naissance</span>
                    <div class="font-bold text-[#1c1c16] text-sm mt-0.5">{{ $application->gender === 'M' ? 'Masculin' : 'Féminin' }} - {{ $application->date_of_birth?->format('d/m/Y') }}</div>
                </div>
                <div class="bg-[#f7f3ea]/60 p-3 rounded-xl border border-[#E2DBCB]">
                    <span class="text-[#52625A] uppercase tracking-wider text-[10px] font-semibold">Nationalité</span>
                    <div class="font-bold text-[#1c1c16] text-sm mt-0.5">{{ $application->nationality }}</div>
                </div>

                <div class="bg-[#f7f3ea]/60 p-3 rounded-xl border border-[#E2DBCB]">
                    <span class="text-[#52625A] uppercase tracking-wider text-[10px] font-semibold">Téléphone</span>
                    <div class="font-bold text-[#1c1c16] text-sm mt-0.5">{{ $application->phone }}</div>
                </div>
                <div class="bg-[#f7f3ea]/60 p-3 rounded-xl border border-[#E2DBCB]">
                    <span class="text-[#52625A] uppercase tracking-wider text-[10px] font-semibold">Adresse Email</span>
                    <div class="font-bold text-[#1c1c16] text-sm mt-0.5">{{ $application->email }}</div>
                </div>
                <div class="bg-[#f7f3ea]/60 p-3 rounded-xl border border-[#E2DBCB]">
                    <span class="text-[#52625A] uppercase tracking-wider text-[10px] font-semibold">Département & Commune</span>
                    <div class="font-bold text-[#1c1c16] text-sm mt-0.5">{{ $application->department ?? '-' }} ({{ $application->municipality ?? '-' }})</div>
                </div>
            </div>
        </div>

        <!-- Section 2: Project & Innovation -->
        <div class="space-y-4">
            <h2 class="font-heading text-base font-bold text-[#063527] border-b border-[#f1eee5] pb-2 flex items-center gap-2">
                <span class="material-symbols-outlined text-lg">lightbulb</span>
                <span>2. L'Invention / Innovation</span>
            </h2>

            <div class="space-y-3 text-xs">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-[#f7f3ea]/60 p-3 rounded-xl border border-[#E2DBCB]">
                        <span class="text-[#52625A] uppercase tracking-wider text-[10px] font-semibold">Titre du projet</span>
                        <div class="font-bold text-[#1c1c16] text-sm mt-0.5">{{ $application->invention_name }}</div>
                    </div>
                    <div class="bg-[#f7f3ea]/60 p-3 rounded-xl border border-[#E2DBCB]">
                        <span class="text-[#52625A] uppercase tracking-wider text-[10px] font-semibold">Secteur Prioritaire</span>
                        <div class="font-bold text-[#006c4f] text-sm mt-0.5">{{ $application->sector }}</div>
                    </div>
                </div>

                @if ($application->summary)
                    <div class="p-3.5 rounded-xl border border-[#E2DBCB] bg-white">
                        <span class="text-[#52625A] uppercase tracking-wider text-[10px] font-semibold">Résumé synthétique</span>
                        <p class="text-[#1c1c16] mt-1 text-sm leading-relaxed">{{ $application->summary }}</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Section 3: Uploaded Documents / Attachments -->
        <div class="space-y-4">
            <h2 class="font-heading text-base font-bold text-[#063527] border-b border-[#f1eee5] pb-2 flex items-center gap-2">
                <span class="material-symbols-outlined text-lg">folder_zip</span>
                <span>3. Pièces Justificatives Déposées ({{ $application->attachments->count() }})</span>
            </h2>

            @if ($application->attachments->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach ($application->attachments as $att)
                        <div class="flex items-center justify-between p-3.5 rounded-xl border border-[#E2DBCB] bg-[#fdf9f0]/60 hover:bg-[#fdf9f0] transition-colors">
                            <div class="flex items-center gap-3 overflow-hidden">
                                <span class="material-symbols-outlined text-2xl text-[#006c4f] shrink-0">attachment</span>
                                <div class="overflow-hidden">
                                    <div class="font-semibold text-xs text-[#1c1c16] truncate" title="{{ $att->original_name }}">{{ $att->original_name }}</div>
                                    <div class="text-[10px] text-[#52625A]">{{ $att->type }} ({{ number_format($att->size_bytes / 1024, 1) }} Ko)</div>
                                </div>
                            </div>
                            <a href="{{ route('admin.attachments.download', $att) }}" class="px-3 py-1.5 rounded-lg bg-[#063527] hover:bg-[#0A4A35] text-white text-xs font-semibold shrink-0 flex items-center gap-1 transition-colors">
                                <span class="material-symbols-outlined text-xs">download</span>
                                <span>Télécharger</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-xs text-[#717974] italic">Aucune pièce jointe téléversée pour ce dossier.</p>
            @endif
        </div>

        <!-- Section 4: All Raw Submitted Answers -->
        @if (!empty($application->form_data))
            <div class="space-y-4">
                <h2 class="font-heading text-base font-bold text-[#063527] border-b border-[#f1eee5] pb-2 flex items-center gap-2">
                    <span class="material-symbols-outlined text-lg">list_alt</span>
                    <span>4. Réponses Détaillées au Questionnaire</span>
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                    @foreach ($application->form_data as $key => $val)
                        @if (!empty($val))
                            <div class="p-3 rounded-xl border border-[#f1eee5] bg-[#f7f3ea]/30">
                                <span class="text-[10px] font-semibold uppercase text-[#52625A]">{{ str_replace('_', ' ', $key) }}</span>
                                <div class="text-[#1c1c16] mt-0.5 break-words font-medium">
                                    @if (is_array($val))
                                        <div class="flex flex-wrap gap-1 mt-1">
                                            @foreach ($val as $item)
                                                <span class="inline-block px-2 py-0.5 rounded bg-[#006c4f]/10 text-[#006c4f] text-[11px] font-medium">{{ is_array($item) ? json_encode($item) : $item }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        {{ $val }}
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
