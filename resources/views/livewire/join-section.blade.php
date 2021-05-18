<div>
    <section id="sectionJoin">
        <h1 class="mb-3">Unirse a una sala</h1>
        <div>
            <x-jet-label for="name" value="{{ __('Nombre de usuario') }}" />
            <x-jet-input autocomplete="off" id="name" wire:model="name" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus />
        </div>

        <div class="mt-4">
            <x-jet-label for="code" value="{{ __('Codigo de la sala') }}" />
            <x-jet-input id="code" wire:model="roomCodeJoin" class="block mt-1 w-full" type="text" name="password" required autocomplete="current-password" />
        </div>

        <div class="flex items-center justify-end mt-4 mb-2">
            <x-jet-button class="ml-4" wire:click="joinRoom">
                {{ __('Unirse a la sala') }}
            </x-jet-button>

            <x-jet-button class="ml-4" wire:click="$emit('showCreateForm')">
                {{ __('Crear una Sala') }}
            </x-jet-button>
        </div>
    </section>

    <section class="hidden" id="sectionCreateRoom">
        <h1 class="mb-3">Crear sala</h1>
        <div>
            <x-jet-label for="name" value="{{ __('Nombre de usuario') }}" />
            <x-jet-input autocomplete="off" id="name"  wire:model.defer="name" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus />
        </div>

        <div class="mt-4">
            <x-jet-label for="roomCodeCreate" value="{{ __('Codigo de la sala') }}" />
            <x-jet-input id="roomCodeCreate"  wire:model.defer="roomCodeCreate" class="block mt-1 w-full" type="text" name="password" required autocomplete="current-password" />
        </div>

        <div class="flex items-center justify-end mt-4 mb-2">
            <x-jet-button class="ml-4" wire:click="createRoom">
                {{ __('Crear sala') }}
            </x-jet-button>
            <x-jet-button class="ml-4" wire:click="$emit('showJoinForm')">
                {{ __('Unirse a una existente') }}
            </x-jet-button>
        </div>
    </section>
</div>


