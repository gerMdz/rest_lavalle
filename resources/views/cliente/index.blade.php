<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Clientes
        </h2>
    </x-slot>

    <x-container class="py-6">
        <x-form-section>
            <x-slot name="title">
                Agregar nuevo cliente
            </x-slot>
            <x-slot:description>
                Llene el formulario para agregar un nuevo cliente
            </x-slot:description>
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-4">
                    <x-input-label>Nombre</x-input-label>
                    <x-text-input class="w-full mt-1">

                    </x-text-input>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-input-label>Url redirección</x-input-label>
                    <x-text-input class="w-full mt-1">

                    </x-text-input>
                </div>
            </div>

            <x-slot:actions>
                <x-primary-button>
                    Agregar
                </x-primary-button>
            </x-slot:actions>
        </x-form-section>
    </x-container>
</x-app-layout>
