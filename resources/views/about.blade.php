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

                        {{-- Failo ikelimas --}}
                        @if (Auth::user()->roles===1)
                            <div class="container mt-5">
                                <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                        
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                        
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="chooseFile">
                                        <label class="custom-file-label" for="chooseFile">Select file</label>
                                    </div>
                        
                                    <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                        Upload Files
                                    </button>
                                </form>
                            </div>
                        @endif

                        {{-- Failo atsisiuntimas --}}
                        <a class="text-xl" href="dwl-file/antras_kontras.pdf">Atsisiuskite PDF faila</a> <br><br>

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
