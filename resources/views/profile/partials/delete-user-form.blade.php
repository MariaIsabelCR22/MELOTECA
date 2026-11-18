
<section class="space-y-6">
    <header>
        <p class="text-xs font-semibold tracking-[0.2em] uppercase text-red-400 mb-2">
            Zona de peligro
        </p>

        <h2 class="text-xl font-semibold text-white">
            Eliminar cuenta
        </h2>

        <p class="mt-2 text-sm text-gray-400 leading-relaxed max-w-2xl">
            Esta acción eliminará permanentemente tu cuenta y todos los álbumes
            asociados a ella. No podrás recuperar esta información después.
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="!rounded-xl !px-5 !py-3 !normal-case !font-semibold"
    >
        Eliminar mi cuenta
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 sm:p-8">
            @csrf
            @method('delete')

            <p class="text-xs font-semibold tracking-[0.2em] uppercase text-red-400 mb-3">
                Confirmación
            </p>

            <h2 class="text-xl font-semibold text-white">
                ¿Estás seguro de eliminar tu cuenta?
            </h2>

            <p class="mt-3 text-sm text-gray-400 leading-relaxed">
                Esta acción es permanente. Todos tus datos y álbumes serán eliminados.
                Introduce tu contraseña para confirmar.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Contraseña" class="!text-gray-300 font-medium" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 block w-full !bg-[#0d0c11] !border-gray-700 !text-white focus:!border-red-500 focus:!ring-red-500 rounded-xl"
                    placeholder="Introduce tu contraseña"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-8 flex flex-wrap justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')" class="!rounded-xl !px-5 !py-3">
                    Cancelar
                </x-secondary-button>

                <x-danger-button class="!rounded-xl !px-5 !py-3 !normal-case !font-semibold">
                    Sí, eliminar mi cuenta
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
