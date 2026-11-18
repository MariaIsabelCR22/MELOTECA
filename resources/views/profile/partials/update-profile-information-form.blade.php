
<section>
    <header class="mb-7">
        <p class="text-xs font-semibold tracking-[0.2em] uppercase text-purple-400 mb-2">
            Tu perfil
        </p>

        <h2 class="text-xl font-semibold text-white">
            Información personal
        </h2>

        <p class="mt-2 text-sm text-gray-400 leading-relaxed">
            Actualiza tu nombre y la dirección de correo electrónico asociada a tu cuenta.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Nombre" class="!text-gray-300 font-medium" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-2 block w-full !bg-[#0d0c11] !border-gray-700 !text-white focus:!border-purple-500 focus:!ring-purple-500 rounded-xl"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Correo electrónico" class="!text-gray-300 font-medium" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-2 block w-full !bg-[#0d0c11] !border-gray-700 !text-white focus:!border-purple-500 focus:!ring-purple-500 rounded-xl"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />

            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 rounded-xl border border-yellow-700/30 bg-yellow-500/5 p-4">
                    <p class="text-sm text-yellow-200">
                        Tu correo electrónico todavía no ha sido verificado.
                    </p>

                    <button
                        form="send-verification"
                        class="mt-2 text-sm text-purple-300 hover:text-purple-200 underline underline-offset-4 transition"
                    >
                        Enviar nuevamente el correo de verificación
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm text-green-400">
                            Se ha enviado un nuevo enlace de verificación.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex flex-wrap items-center gap-4 pt-2">
            <x-primary-button class="!bg-purple-600 hover:!bg-purple-500 !rounded-xl !px-6 !py-3 !normal-case !font-semibold focus:!ring-purple-500">
                Guardar cambios
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2500)"
                    class="text-sm text-green-400"
                >
                    Cambios guardados correctamente.
                </p>
            @endif
        </div>
    </form>
</section>
