@extends('layouts.app')

@section('title', 'Page introuvable (404) | ABRI 2026')

@section('content')
<div class="min-h-[calc(100vh-320px)] flex items-center justify-center px-4 py-16">
    <div class="max-w-md w-full bg-white p-8 sm:p-10 rounded-2xl border border-[#E2DBCB] shadow-xs text-center space-y-6">
        <div class="w-16 h-16 rounded-2xl bg-[#f1eee5] text-[#006c4f] flex items-center justify-center mx-auto">
            <span class="material-symbols-outlined text-3xl">search_off</span>
        </div>

        <div class="space-y-2">
            <span class="text-xs font-mono font-bold text-[#E8112D] uppercase tracking-wider">Erreur 404</span>
            <h1 class="font-heading text-2xl font-bold text-[#001e14]">Page ou dossier introuvable</h1>
            <p class="text-sm text-[#52625A] leading-relaxed">
                La page ou le document auquel vous tentez d'accéder n'existe pas ou a été déplacé.
            </p>
        </div>

        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('applications.create') }}" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-[#063527] hover:bg-[#0A4A35] text-white font-semibold text-sm transition-colors flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-base">home</span>
                <span>Retour à l'accueil</span>
            </a>
            <button onclick="window.history.back()" class="w-full sm:w-auto px-4 py-2.5 rounded-xl border border-[#c0c8c3] text-[#52625A] hover:bg-[#f1eee5] font-semibold text-sm transition-colors">
                Page précédente
            </button>
        </div>
    </div>
</div>
@endsection
