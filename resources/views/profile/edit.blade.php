
@extends('layouts.meloteca')

@section('content')

<div class="max-w-4xl mx-auto space-y-8">

    <div class="border-b border-gray-800 pb-6">
        <p class="text-xs font-semibold tracking-[0.25em] uppercase text-purple-400 mb-3">
            Configuración personal
        </p>

        <h1 class="text-3xl sm:text-4xl font-bold text-white tracking-tight">
            Mi cuenta<span class="text-purple-400">.</span>
        </h1>

        <p class="text-gray-400 mt-3 max-w-xl leading-relaxed">
            Administra tu información personal, actualiza tu contraseña
            y mantén tu cuenta al día.
        </p>
    </div>

    <section class="bg-[#14121a] border border-gray-800/80 rounded-2xl p-6 sm:p-8 shadow-xl shadow-black/10">
        @include('profile.partials.update-profile-information-form')
    </section>

    <section class="bg-[#14121a] border border-gray-800/80 rounded-2xl p-6 sm:p-8 shadow-xl shadow-black/10">
        @include('profile.partials.update-password-form')
    </section>

    <section class="bg-[#171116] border border-red-900/40 rounded-2xl p-6 sm:p-8">
        @include('profile.partials.delete-user-form')
    </section>

</div>

@endsection
