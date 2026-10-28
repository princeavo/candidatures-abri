@extends('layouts.app')

@section('title', 'Candidature enregistrée | ABRI 2026')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-16 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl shadow-xs border border-[#E2DBCB] p-8 sm:p-12 text-center space-y-6">
        
        <!-- Success Badge -->
        <div class="w-16 h-16 rounded-full bg-[#E6F2EC] text-[#006c4f] flex items-center justify-center mx-auto border border-[#006c4f]/20">
            <span class="material-symbols-outlined text-3xl font-bold">check_circle</span>
        </div>

        <div class="space-y-2">
            <span class="text-xs font-bold uppercase tracking-wider text-[#006c4f]">Enregistrement Réussi</span>
            <h1 class="font-heading text-3xl font-bold text-[#001e14]">Votre candidature a bien été transmise !</h1>
            <p class="text-sm text-[#52625A] max-w-xl mx-auto">
                L'Agence Béninoise de la Recherche et de l'Innovation accuse réception de votre dossier pour la session 2026.
            </p>
        </div>

        <!-- Reference Code Box -->
        <div class="bg-[#f1eee5] p-6 rounded-2xl border border-[#c0c8c3]/60 max-w-md mx-auto space-y-1">
            <span class="text-xs font-semibold uppercase tracking-wider text-[#52625A]">Numéro officiel de référence</span>
            <div class="font-mono text-2xl font-bold text-[#063527] tracking-wider select-all">
                {{ $application->reference_code }}
            </div>
            <p class="text-[11px] text-[#52625A] pt-1">
                Conservez précieusement ce code pour toute correspondance avec l'ABRI.
            </p>
        </div>

        <!-- Summary Details -->
        <div class="border-t border-[#f1eee5] pt-6 text-left max-w-md mx-auto text-xs text-[#52625A] space-y-2">
            <div class="flex justify-between py-1 border-b border-[#f1eee5]">
                <span class="font-medium">Candidat :</span>
                <span class="font-bold text-[#1c1c16]">{{ $application->first_name }} {{ $application->last_name }}</span>
            </div>
            <div class="flex justify-between py-1 border-b border-[#f1eee5]">
                <span class="font-medium">Projet :</span>
                <span class="font-bold text-[#1c1c16]">{{ $application->invention_name }}</span>
            </div>
            <div class="flex justify-between py-1 border-b border-[#f1eee5]">
                <span class="font-medium">Secteur :</span>
                <span class="font-bold text-[#1c1c16]">{{ $application->sector }}</span>
            </div>
            <div class="flex justify-between py-1">
                <span class="font-medium">Date d'enregistrement :</span>
                <span class="font-bold text-[#1c1c16]">{{ $application->submitted_at?->format('d/m/Y à H:i') }}</span>
            </div>
        </div>

        <!-- Back Home Action -->
        <div class="pt-4 flex items-center justify-center gap-3">
            <a href="{{ route('applications.create') }}" class="px-6 py-2.5 rounded-xl bg-[#063527] hover:bg-[#0A4A35] text-white text-sm font-semibold transition-colors flex items-center gap-2">
                <span class="material-symbols-outlined text-lg">add_circle</span>
                <span>Nouvelle candidature</span>
            </a>
            <button onclick="window.print()" class="px-5 py-2.5 rounded-xl border border-[#c0c8c3] text-[#52625A] hover:bg-[#f1eee5] text-sm font-semibold transition-colors flex items-center gap-1.5">
                <span class="material-symbols-outlined text-lg">print</span>
                <span>Imprimer l'accusé</span>
            </button>
        </div>
    </div>
</div>
@endsection
