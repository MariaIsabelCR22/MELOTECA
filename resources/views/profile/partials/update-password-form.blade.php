
<section>
    <header class="mb-7">
        <p class="text-xs font-semibold tracking-[0.2em] uppercase text-purple-400 mb-2">
            Seguridad
        </p>

        <h2 class="text-xl font-semibold text-white">
            Cambiar contraseña
        </h2>

        <p class="mt-2 text-sm text-gray-400 leading-relaxed">
            Utiliza una contraseña segura para proteger el acceso a tu colección.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" value="Contraseña actual" class="!text-gray-300 font-medium" />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-2 block w-full !bg-[#0d0c11] !border-gray-700 !text-white focus:!border-purple-500 focus:!ring-purple-500 rounded-xl"
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" value="Nueva contraseña" class="!text-gray-300 font-medium" />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-2 block w-full !bg-[#0d0c11] !border-gray-700 !text-white focus:!border-purple-500 focus:!ring-purple-500 rounded-xl"
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" value="Confirmar nueva contraseña" class="!text-gray-300 font-medium" />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-2 block w-full !bg-[#0d0c11] !border-gray-700 !text-white focus:!border-purple-500 focus:!ring-purple-500 rounded-xl"
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-wrap items-center gap-4 pt-2">
            <x-primary-button class="!bg-purple-600 hover:!bg-purple-500 !rounded-xl !px-6 !py-3 !normal-case !font-semibold focus:!ring-purple-500">
                Actualizar contraseña
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2500)"
                    class="text-sm text-green-400"
                >
                    Contraseña actualizada correctamente.
                </p>
            @endif
        </div>
    </form>
</section>
