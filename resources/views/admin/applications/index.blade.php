@extends('layouts.app')

@section('title', 'Tableau de bord | Consultation ABRI 2026')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">

    <!-- Header & Action Row -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-4 border-b border-[#E2DBCB]">
        <div>
            <div class="text-xs uppercase tracking-wider text-[#52625A] font-semibold">Espace Consultation</div>
            <h1 class="font-heading text-2xl sm:text-3xl font-bold text-[#001e14] mt-1">Dossiers de Candidature Reçus</h1>
            <p class="text-xs text-[#52625A]">Session 2026 - Agence Béninoise de la Recherche et de l'Innovation</p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('admin.applications.export-csv') }}" class="px-4 py-2.5 rounded-xl bg-[#063527] hover:bg-[#0A4A35] text-white text-xs font-semibold transition-colors flex items-center gap-2 shadow-xs">
                <span class="material-symbols-outlined text-base">download</span>
                <span>Exporter en CSV (Excel)</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-[#E2DBCB] shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs text-[#52625A] font-medium uppercase tracking-wider">Total Dossiers Reçus</span>
                <div class="font-heading text-3xl font-bold text-[#001e14] mt-1">{{ $totalCount }}</div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-[#E6F2EC] text-[#006c4f] flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">folder_shared</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-[#E2DBCB] shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs text-[#52625A] font-medium uppercase tracking-wider">Secteurs Représentés</span>
                <div class="font-heading text-3xl font-bold text-[#001e14] mt-1">{{ count($sectors) }}</div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-[#93f2cb]/30 text-[#007153] flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">category</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-[#E2DBCB] shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs text-[#52625A] font-medium uppercase tracking-wider">Départements Actifs</span>
                <div class="font-heading text-3xl font-bold text-[#001e14] mt-1">{{ count($departments) }}</div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-[#F2B705]/20 text-[#8A6200] flex items-center justify-center">
                <span class="material-symbols-outlined text-2xl">location_on</span>
            </div>
        </div>
    </div>

    <!-- Search & Filters Toolbar -->
    <form method="GET" action="{{ route('admin.applications.index') }}" class="bg-white p-4 rounded-2xl border border-[#E2DBCB] shadow-xs flex flex-col md:flex-row items-center gap-3">
        <!-- Search input -->
        <div class="relative flex-1 w-full">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher par référence, candidat, projet, email..."
                   class="w-full pl-10 pr-4 py-2 rounded-xl border border-[#c0c8c3] text-xs focus:border-[#006c4f] focus:ring-1 focus:ring-[#006c4f]">
            <span class="material-symbols-outlined text-base text-[#717974] absolute left-3 top-2.5">search</span>
        </div>

        <!-- Sector Filter -->
        <div class="w-full md:w-64">
            <select name="sector" class="w-full px-3 py-2 rounded-xl border border-[#c0c8c3] text-xs bg-white">
                <option value="">Tous les secteurs</option>
                @foreach ($sectors as $sec)
                    <option value="{{ $sec }}" {{ request('sector') === $sec ? 'selected' : '' }}>{{ $sec }}</option>
                @endforeach
            </select>
        </div>

        <!-- Department Filter -->
        <div class="w-full md:w-52">
            <select name="department" class="w-full px-3 py-2 rounded-xl border border-[#c0c8c3] text-xs bg-white">
                <option value="">Tous les départements</option>
                @foreach ($departments as $dep)
                    <option value="{{ $dep }}" {{ request('department') === $dep ? 'selected' : '' }}>{{ $dep }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center gap-2 w-full md:w-auto">
            <button type="submit" class="px-4 py-2 rounded-xl bg-[#063527] text-white text-xs font-semibold hover:bg-[#0A4A35] transition-colors w-full md:w-auto">
                Filtrer
            </button>
            @if (request()->hasAny(['search', 'sector', 'department']))
                <a href="{{ route('admin.applications.index') }}" class="px-3 py-2 rounded-xl border border-[#c0c8c3] text-xs text-[#52625A] hover:bg-[#f1eee5] transition-colors">
                    Effacer
                </a>
            @endif
        </div>
    </form>

    <!-- Applications Table -->
    <div class="bg-white rounded-2xl border border-[#E2DBCB] shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#f1eee5] text-[#52625A] font-semibold border-b border-[#E2DBCB] uppercase tracking-wider text-[11px]">
                    <tr>
                        <th class="py-3 px-4">Référence</th>
                        <th class="py-3 px-4">Candidat</th>
                        <th class="py-3 px-4">Projet / Invention</th>
                        <th class="py-3 px-4">Secteur</th>
                        <th class="py-3 px-4">Département</th>
                        <th class="py-3 px-4 text-center">Pièces</th>
                        <th class="py-3 px-4">Date de Dépôt</th>
                        <th class="py-3 px-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#f1eee5]">
                    @forelse ($applications as $app)
                        <tr class="hover:bg-[#f7f3ea]/50 transition-colors">
                            <td class="py-3.5 px-4 font-mono font-bold text-[#063527] whitespace-nowrap">
                                {{ $app->reference_code }}
                            </td>
                            <td class="py-3.5 px-4 font-medium text-[#1c1c16]">
                                <div>{{ $app->last_name }} {{ $app->first_name }}</div>
                                <div class="text-[11px] text-[#52625A]">{{ $app->phone }}</div>
                            </td>
                            <td class="py-3.5 px-4 text-[#1c1c16] font-semibold max-w-xs truncate" title="{{ $app->invention_name }}">
                                {{ $app->invention_name }}
                            </td>
                            <td class="py-3.5 px-4 text-[#52625A]">
                                <span class="inline-block px-2 py-0.5 rounded-full bg-[#f1eee5] text-[11px] text-[#001e14]">
                                    {{ $app->sector }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-[#52625A]">
                                {{ $app->department ?? '-' }}
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#E6F2EC] text-[#006c4f] font-semibold text-[11px]">
                                    <span class="material-symbols-outlined text-xs">attach_file</span>
                                    {{ $app->attachments_count }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-[#52625A] whitespace-nowrap">
                                {{ $app->submitted_at?->format('d/m/Y H:i') ?? '-' }}
                            </td>
                            <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                <a href="{{ route('admin.applications.show', $app) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-[#063527] hover:bg-[#0A4A35] text-white text-xs font-semibold transition-colors">
                                    <span class="material-symbols-outlined text-sm">visibility</span>
                                    <span>Consulter</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-12 text-center text-sm text-[#52625A]">
                                <span class="material-symbols-outlined text-4xl text-[#c0c8c3] block mb-2">inbox</span>
                                Aucun dossier de candidature trouvé pour le moment.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($applications->hasPages())
            <div class="p-4 border-t border-[#f1eee5]">
                {{ $applications->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
