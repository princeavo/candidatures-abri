@extends('layouts.app')

@section('title', 'Maintenance en cours (503) | ABRI 2026')

@section('content')
<div class="min-h-[calc(100vh-320px)] flex items-center justify-center px-4 py-16">
    <div class="max-w-md w-full bg-white p-8 sm:p-10 rounded-2xl border border-[#E2DBCB] shadow-xs text-center space-y-6">
        <div class="w-16 h-16 rounded-2xl bg-[#e0f2fe] text-[#0369a1] flex items-center justify-center mx-auto">
            <span class="material-symbols-outlined text-3xl">build_circle</span>
        </div>

        <div class="space-y-2">
            <span class="text-xs font-mono font-bold text-[#0369a1] uppercase tracking-wider">Erreur 503</span>
            <h1 class="font-heading text-2xl font-bold text-[#001e14]">Plateforme en maintenance</h1>
            <p class="text-sm text-[#52625A] leading-relaxed">
                Une opération de maintenance programmée est actuellement en cours pour améliorer le service. La plateforme sera de nouveau accessible dans les plus brefs délais.
            </p>
        </div>

        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-3">
            <button onclick="window.location.reload()" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-[#063527] hover:bg-[#0A4A35] text-white font-semibold text-sm transition-colors flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-base">refresh</span>
                <span>Réessayer maintenant</span>
            </button>
            <a href="mailto:contact@abri.bj" class="w-full sm:w-auto px-4 py-2.5 rounded-xl border border-[#c0c8c3] text-[#52625A] hover:bg-[#f1eee5] font-semibold text-sm transition-colors flex items-center justify-center gap-1.5">
                <span class="material-symbols-outlined text-base">mail</span>
                <span>Nous contacter</span>
            </a>
        </div>
    </div>
</div>
@endsection
