
<x-guest-layout>

    <div class="mb-7">
        <h1 class="text-xl font-semibold text-white">
            Crear cuenta
        </h1>

        <p class="text-sm text-gray-400 mt-1">
            Registra tu cuenta en Meloteca.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="name" value="Nombre" class="!text-gray-300" />

            <x-text-input
                id="name"
                class="block mt-2 w-full !bg-[#0c0b10] !border-gray-700 !text-white focus:!border-purple-500 focus:!ring-purple-500 rounded-lg"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" value="Correo electrónico" class="!text-gray-300" />

            <x-text-input
                id="email"
                class="block mt-2 w-full !bg-[#0c0b10] !border-gray-700 !text-white focus:!border-purple-500 focus:!ring-purple-500 rounded-lg"
                type="email"
                name="email"
                :value="old('email')"
                required
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
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" value="Confirmar contraseña" class="!text-gray-300" />

            <x-text-input
                id="password_confirmation"
                class="block mt-2 w-full !bg-[#0c0b10] !border-gray-700 !text-white focus:!border-purple-500 focus:!ring-purple-500 rounded-lg"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button
            type="submit"
            class="w-full bg-purple-600 hover:bg-purple-500 text-white text-sm font-medium rounded-lg py-3 transition"
        >
            Crear cuenta
        </button>
    </form>

    <div class="border-t border-gray-800 mt-6 pt-5 text-center">
        <p class="text-sm text-gray-400">
            ¿Ya tienes una cuenta?
            <a href="{{ route('login') }}" class="text-purple-400 hover:text-purple-300 transition">
                Inicia sesión
            </a>
        </p>
    </div>

</x-guest-layout>
