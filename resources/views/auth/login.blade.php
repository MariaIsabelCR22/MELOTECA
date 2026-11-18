
<x-guest-layout>

    <div class="mb-7">
        <h1 class="text-xl font-semibold text-white">
            Iniciar sesión
        </h1>

        <p class="text-sm text-gray-400 mt-1">
            Accede a tu colección musical.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" value="Correo electrónico" class="!text-gray-300" />

            <x-text-input
                id="email"
                class="block mt-2 w-full !bg-[#0c0b10] !border-gray-700 !text-white focus:!border-purple-500 focus:!ring-purple-500 rounded-lg"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" value="Contraseña" class="!text-gray-300" />

            <x-text-input
                id="password"
                class="block mt-2 w-full !bg-[#0c0b10] !border-gray-700 !text-white focus:!border-purple-500 focus:!ring-purple-500 rounded-lg"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between gap-3">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-700 bg-[#0c0b10] text-purple-600 focus:ring-purple-500 focus:ring-offset-[#14121a]"
                >

                <span class="ms-2 text-sm text-gray-400">
                    Recordarme
                </span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-purple-400 hover:text-purple-300 transition">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <button
            type="submit"
            class="w-full bg-purple-600 hover:bg-purple-500 text-white text-sm font-medium rounded-lg py-3 transition"
        >
            Iniciar sesión
        </button>
    </form>

    <div class="border-t border-gray-800 mt-6 pt-5 text-center">
        <p class="text-sm text-gray-400">
            ¿No tienes una cuenta?
            <a href="{{ route('register') }}" class="text-purple-400 hover:text-purple-300 transition">
                Regístrate
            </a>
        </p>
    </div>

</x-guest-layout>
