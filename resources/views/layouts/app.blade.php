<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Candidature ABRI 2026') | Agence Béninoise de la Recherche et de l'Innovation</title>

    <!-- Google Fonts: Bricolage Grotesque & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="min-h-full flex flex-col bg-[#F7F3EA] text-[#12211B] font-body antialiased selection:bg-[#93f2cb] selection:text-[#002116]">

    <!-- Official Top Bar -->
    <header class="w-full z-50 bg-[#063527] text-white">
        <!-- Top Institutional Strip -->
        <div class="border-b border-[#0A4A35]/60 text-xs py-2 px-3 sm:px-8">
            <div class="max-w-7xl mx-auto flex items-center justify-between gap-2">
                <div class="flex items-center gap-2 min-w-0">
                    <!-- Benin Flag Mini Badge -->
                    <span class="inline-flex overflow-hidden rounded-xs w-4 h-2.5 shadow-xs shrink-0">
                        <span class="w-1/3 bg-[#008751] h-full"></span>
                        <span class="w-1/3 bg-[#FCD116] h-full"></span>
                        <span class="w-1/3 bg-[#E8112D] h-full"></span>
                    </span>
                    <span class="font-medium tracking-wide truncate">RÉPUBLIQUE DU BÉNIN</span>
                    <span class="hidden sm:inline text-white/40">|</span>
                    <span class="hidden sm:inline text-[#a3d0bc] text-[11px] font-normal truncate">Fraternité - Justice - Travail</span>
                </div>
                <div class="flex items-center gap-3 sm:gap-4 text-xs text-[#a3d0bc] shrink-0">
                    <span class="hidden md:inline">Contact : contact@abri.bj</span>
                    <span class="hidden md:inline">|</span>
                    @auth
                        <a href="{{ route('admin.applications.index') }}" class="underline hover:text-white flex items-center gap-1 text-[11px] sm:text-xs">
                            <span class="material-symbols-outlined text-sm">dashboard</span>
                            <span class="hidden sm:inline">Espace Admin ({{ Auth::user()->name }})</span>
                            <span class="sm:hidden">Admin</span>
                        </a>
                    @else
                        <a href="{{ route('admin.login') }}" class="hover:text-white flex items-center gap-1 text-[11px] sm:text-xs">
                            <span class="material-symbols-outlined text-sm">lock</span>
                            <span class="hidden sm:inline">Accès Administration</span>
                            <span class="sm:hidden">Admin</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Main Header Nav -->
        <div class="h-16 sm:h-20 max-w-7xl mx-auto px-3 sm:px-8 flex items-center justify-between gap-3 sm:gap-6">
            <a href="{{ route('applications.create') }}" class="flex items-center gap-2.5 sm:gap-4 group min-w-0">
                <div class="bg-white px-2 py-1 sm:px-3 sm:py-1.5 rounded-xl border border-white/20 shadow-xs flex items-center shrink-0">
                    <img src="{{ asset('images/logo-mesrs.png') }}" alt="République du Bénin | MESRS" class="h-8 sm:h-10 w-auto object-contain">
                </div>
                <div class="flex flex-col min-w-0">
                    <span class="font-heading text-base sm:text-xl font-bold tracking-tight text-white leading-tight truncate">ABRI BÉNIN</span>
                    <span class="hidden sm:block text-xs uppercase tracking-wider text-[#a3d0bc] truncate">Agence Béninoise pour la Recherche et l'Innovation</span>
                    <span class="sm:hidden text-[10px] text-[#a3d0bc] truncate">Recherche & Innovation</span>
                </div>
            </a>

            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                @auth
                    <a href="{{ route('admin.applications.index') }}" class="px-3 sm:px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold bg-[#0A4A35] hover:bg-[#0D5C45] text-white transition-colors flex items-center gap-1.5 sm:gap-2">
                        <span class="material-symbols-outlined text-base sm:text-lg">dashboard</span>
                        <span class="hidden sm:inline">Tableau de bord</span>
                        <span class="sm:hidden">Dossiers</span>
                    </a>
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-2.5 sm:px-3 py-2 rounded-xl text-xs sm:text-sm font-semibold text-[#a3d0bc] hover:text-white transition-colors">
                            <span class="hidden sm:inline">Déconnexion</span>
                            <span class="sm:hidden material-symbols-outlined text-base">logout</span>
                        </button>
                    </form>
                @else
                    <a href="{{ route('applications.create') }}" class="px-3 sm:px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold bg-[#F2B705] hover:bg-[#e0a800] text-[#001e14] transition-colors flex items-center gap-1.5 shadow-sm">
                        <span class="material-symbols-outlined text-base sm:text-lg">edit_note</span>
                        <span><span class="hidden sm:inline">Formulaire de </span>Candidature</span>
                    </a>
                @endauth
            </div>
        </div>

        <!-- Signature Tricolor Ribbon -->
        <div class="w-full h-1 flex">
            <div class="w-1/3 bg-[#008751]"></div>
            <div class="w-1/3 bg-[#FCD116]"></div>
            <div class="w-1/3 bg-[#E8112D]"></div>
        </div>
    </header>

    <!-- Content Slot -->
    <main class="flex-1 w-full">
        @yield('content')
    </main>

    <!-- Official Benin Footer -->
    <footer class="w-full bg-[#063527] text-white mt-16 border-t border-[#0A4A35]">
        <div class="max-w-7xl mx-auto px-6 py-12 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Col 1: Identity -->
                <div class="space-y-4 md:col-span-2">
                    <div class="flex items-center gap-3">
                        <div class="bg-white px-3 py-1.5 rounded-xl border border-white/20 inline-block shadow-xs shrink-0">
                            <img src="{{ asset('images/logo-mesrs.png') }}" alt="République du Bénin | MESRS" class="h-8 w-auto object-contain">
                        </div>
                        <div class="flex flex-col">
                            <span class="font-heading text-lg font-bold text-white">ABRI BÉNIN</span>
                            <span class="text-xs text-[#a3d0bc]">Session Officielle 2026</span>
                        </div>
                    </div>
                    <p class="text-sm text-[#a3d0bc] max-w-md leading-relaxed">
                        L'Agence Béninoise pour la Recherche et l'Innovation (ABRI) est l'organe public de mise en oeuvre de la politique nationale en matière de valorisation des résultats de recherche, d'inventions et d'innovations technologiques en République du Bénin.
                    </p>
                    <div class="text-xs text-[#a3d0bc]">
                        <span>Plateforme officielle de dépôt de candidature</span>
                    </div>
                </div>

                <!-- Col 2: Useful Links -->
                <div class="space-y-3">
                    <h4 class="font-heading text-sm font-semibold text-white tracking-wider uppercase">Liens Utiles</h4>
                    <ul class="space-y-2 text-sm text-[#a3d0bc]">
                        <li><a href="{{ route('applications.create') }}" class="hover:text-white transition-colors">Déposer une candidature</a></li>
                        <li><a href="{{ route('admin.login') }}" class="hover:text-white transition-colors">Portail Administration</a></li>
                        <li><a href="https://recensementguide.bj" target="_blank" class="hover:text-white transition-colors">Portail National Guides</a></li>
                    </ul>
                </div>

                <!-- Col 3: Contact & Legal -->
                <div class="space-y-3">
                    <h4 class="font-heading text-sm font-semibold text-white tracking-wider uppercase">Contact</h4>
                    <p class="text-sm text-[#a3d0bc] leading-relaxed">
                        Cotonou, République du Bénin<br>
                        Email : <a href="mailto:contact@abri.bj" class="underline hover:text-white">contact@abri.bj</a>
                    </p>
                    <p class="text-xs text-[#739f8c] pt-2">
                        Conforme à la législation sur la protection des données personnelles (APDP).
                    </p>
                </div>
            </div>

            <!-- Bottom Sub-footer -->
            <div class="mt-10 pt-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#a3d0bc]">
                <p>© {{ date('Y') }} République du Bénin - Agence Béninoise de la Recherche et de l'Innovation. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
