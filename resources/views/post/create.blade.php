<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sukurti naują įrašą') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg shadow-2xl">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="shadow-2xl rounded-xl flex-none w-100 lg:w-100 md:w-xl">

                        <form  action="/post" method="POST">
                            @csrf

                            <!-- Išvykos data -->
                            <div>
                                <x-label for="metai" :value="__('Išvykos data')" />

                                <x-input id="metai" class="block mt-1 w-full"
                                 type="date" name="Metai"  required autofocus />
                            </div>

                            <!-- Išvykos šalis -->
                            <div class="mt-4">
                                <x-label for="salis" :value="__('Išvykos šalis')" />

                                <x-input id="salis" class="block mt-1 w-full"
                                 type="text" name="Salis"  required />
                            </div>

                            <!-- Išvykos Universitetas -->
                            <div class="mt-4">
                                <x-label for="universitetas" :value="__('Išvykos Universitetas')" />

                                <x-input id="universitetas" class="block mt-1 w-full"
                                 type="text" name="Universitetas"  required />
                            </div>

                                <x-button class="ml-4 py-2 m-4" type="submit">
                                    {{ __('Sukurti naują įrašą') }}
                                </x-button>
                            </div>
                        </form>
                 </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
