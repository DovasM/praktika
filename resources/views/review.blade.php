<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Parašykite atsiliepimą') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg shadow-2xl">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="shadow-2xl rounded-xl flex-none w-100 lg:w-100 md:w-xl">

                        <form  action="/review" method="POST">
                            @csrf

                            <!-- Atsiliepimas -->
                            <div>
                                <x-label for="Salis" :value="__('Šalis')" />

                                <x-input id="Salis" class="block mt-1 w-full"
                                type="text" name="Salis"  required autofocus />

                                <x-label for="review" :value="__('Atsiliepimas')" />

                                <textarea id="review" class="block mt-1 w-full"
                                 type="text" name="review"  required autofocus ></textarea>
                            </div>

                            <x-button class="ml-4 py-2 m-4" type="submit">
                                {{ __('Palikite atsiliepimą') }}
                            </x-button>


                        </form>
                    </div>
                 </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
