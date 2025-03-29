<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Clientes
        </h2>
    </x-slot>

    <x-container id="app" class="py-6">
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
                    <x-text-input v-model="createForm.name" class="w-full mt-1"/>


                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-input-label>Url redirección</x-input-label>
                    <x-text-input v-model="createForm.redirect" class="w-full mt-1"/>
                </div>
            </div>

            <x-slot:actions>
                <x-primary-button v-on:click="store">
                    Agregar
                </x-primary-button>
            </x-slot:actions>
        </x-form-section>
    </x-container>

    @push('js')
        <script>
            const {createApp} = Vue
            createApp({
                data() {
                    return {
                        createForm: {
                            errors: [],
                            name: null,
                            redirect: null,
                        },
                    }
                },
                methods: {
                    store: function () {
                        axios.post('/oauth/clients', this.createForm)
                            .then(response => {
                                this.createForm.name = null;
                                this.createForm.redirect = null;
                                Swal.fire(
                                    'Cliente guardado',
                                    'El cliente fue guardado correctamente.',
                                    'success'
                                );
                            }).catch(error => {
                            Swal.fire(
                                'Error en los campos',
                                'Los valores no se han ingresado correctamente.',
                                'error'
                            );
                            // alert('No has completado los datos correspondientes')
                        })
                    }
                }
            }).mount('#app');



        </script>
    @endpush
</x-app-layout>
