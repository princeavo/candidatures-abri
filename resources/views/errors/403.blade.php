@extends('layouts.app')

@section('title', 'Accès interdit (403) | ABRI 2026')

@section('content')
<div class="min-h-[calc(100vh-320px)] flex items-center justify-center px-4 py-16">
    <div class="max-w-md w-full bg-white p-8 sm:p-10 rounded-2xl border border-[#E2DBCB] shadow-xs text-center space-y-6">
        <div class="w-16 h-16 rounded-2xl bg-[#fee2e2] text-[#E8112D] flex items-center justify-center mx-auto">
            <span class="material-symbols-outlined text-3xl">gpp_maybe</span>
        </div>

        <div class="space-y-2">
            <span class="text-xs font-mono font-bold text-[#E8112D] uppercase tracking-wider">Erreur 403</span>
            <h1 class="font-heading text-2xl font-bold text-[#001e14]">Accès non autorisé</h1>
            <p class="text-sm text-[#52625A] leading-relaxed">
                Vous ne disposez pas des habilitations nécessaires pour accéder à cet espace ou à cette ressource administrative.
            </p>
        </div>

        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('applications.create') }}" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-[#063527] hover:bg-[#0A4A35] text-white font-semibold text-sm transition-colors flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-base">home</span>
                <span>Retour au formulaire</span>
            </a>
            <a href="{{ route('admin.login') }}" class="w-full sm:w-auto px-4 py-2.5 rounded-xl border border-[#c0c8c3] text-[#52625A] hover:bg-[#f1eee5] font-semibold text-sm transition-colors flex items-center justify-center gap-1.5">
                <span class="material-symbols-outlined text-base">lock</span>
                <span>Connexion agent</span>
            </a>
        </div>
    </div>
</div>
@endsection
