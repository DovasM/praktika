<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Apie projekta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg shadow-2xl">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>
                    Šis projektas buvo pasirinktas pagal Kauno kolegijos užsakyma, kaip praktikos darbas, to pasakoje buvo išsikelti tikslai <br> <br>
                    Sukurti WEB administracine apklikacija su duomenų baze, skirta registruoti duomenis studentams dėl ,,Erasmus” išvykų ir jos koreguoti.
                    Tuos duomenis administraciją gales peržiūrėti, filtruoti, išsisaugoti į excel failą, bei vygdyti duomenų koregacijas.
                    Prisijungti prie aplikacijos bus galima tik įtraukus administratoriui naują darbuotoją į duomenų bazę ir pateikus darbuotojui prisijungimo duomenis. <br> <br>
                    Projektas bus aprašomas naudojantis ,,MS Visual studio code” programavimo aplinka, naudojant ,, Laravel vers. 8.61.0”.
                     Aplikacija turės realicine duomenų baze ,,MariaDB vers. 10.4.18”. <br><br>

                        {{-- Failo atsisiuntimas --}}
                        <a class="text-xl" href="get/antras_kontras.pdf">Atsisiuskite PDF faila</a> <br><br>

                     <i class="font-bold">Projekto uždaviniai:</i> <ol>
                         <li>Duomenų bazė</li>
                         <li>Login/Register sistema</li>
                         <li>Duomenų filtravimas</li>
                         <li>Dizainas (Kauno Kolegija)</li>
                         <li>Lengvas, bei patogys GUI</li>
                     </ol>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
