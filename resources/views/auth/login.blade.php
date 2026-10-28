@extends('layouts.app')

@section('title', 'Connexion Administration | ABRI 2026')

@section('content')
<div class="min-h-[calc(100vh-280px)] flex items-center justify-center px-3 sm:px-4 py-8 sm:py-12">
    <div class="w-full max-w-md bg-white p-5 sm:p-10 rounded-2xl shadow-xs border border-[#E2DBCB] space-y-6">
        
        <!-- Header / Badge -->
        <div class="text-center space-y-3">
            <div class="w-14 h-14 rounded-2xl bg-[#063527]/10 text-[#063527] flex items-center justify-center mx-auto">
                <span class="material-symbols-outlined text-3xl">admin_panel_settings</span>
            </div>
            <div>
                <h1 class="font-heading text-xl font-bold text-[#001e14]">Espace Administration</h1>
                <p class="text-xs text-[#52625A] mt-0.5">Accès réservé aux agents et gestionnaires de l'ABRI.</p>
            </div>
        </div>

        <!-- Errors Alert -->
        @if ($errors->any())
            <div class="bg-[#ffdad6] border border-[#ba1a1a]/40 p-3.5 rounded-xl text-xs text-[#93000a] flex items-center gap-2">
                <span class="material-symbols-outlined text-base shrink-0">error</span>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.login') }}" class="space-y-4" x-data="{ showPassword: false }">
            @csrf

            <div>
                <label for="email" class="block text-xs font-semibold uppercase text-[#52625A] mb-1">
                    Adresse Email Professionnelle <span class="text-[#E8112D]">*</span>
                </label>
                <div class="relative">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="agent@abri.bj"
                           class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#c0c8c3] focus:border-[#006c4f] focus:ring-2 focus:ring-[#006c4f]/20 text-sm">
                    <span class="material-symbols-outlined text-lg text-[#717974] absolute left-3 top-3">mail</span>
                </div>
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold uppercase text-[#52625A] mb-1">
                    Mot de passe <span class="text-[#E8112D]">*</span>
                </label>
                <div class="relative">
                    <input :type="showPassword ? 'text' : 'password'" id="password" name="password" required placeholder="Mot de passe"
                           class="w-full pl-10 pr-10 py-2.5 rounded-xl border border-[#c0c8c3] focus:border-[#006c4f] focus:ring-2 focus:ring-[#006c4f]/20 text-sm">
                    <span class="material-symbols-outlined text-lg text-[#717974] absolute left-3 top-3">lock</span>
                    <button type="button" @click="showPassword = !showPassword" class="absolute right-3 top-2.5 text-[#717974] hover:text-[#1c1c16]">
                        <span class="material-symbols-outlined text-lg" x-text="showPassword ? 'visibility_off' : 'visibility'"></span>
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between text-xs pt-1">
                <label class="flex items-center gap-2 cursor-pointer text-[#52625A]">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded text-[#063527] border-[#c0c8c3]">
                    <span>Se souvenir de moi</span>
                </label>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full py-3 px-4 rounded-xl bg-[#063527] hover:bg-[#0A4A35] text-white font-bold text-sm transition-colors flex items-center justify-center gap-2 shadow-xs">
                    <span>Se connecter</span>
                    <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
