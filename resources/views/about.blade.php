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
                                        <label class="custom-file-label" for="chooseFile">Pasirinkinte failą</label>
                                    </div>
                        
                                    <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                       Įkelti  failą
                                    </button>
                                </form>
                            </div>
                        @endif
                        <br><br>
                        {{-- Failo atsisiuntimas --}}
                        <a class="text-xl" href="dwl-file/Test.pdf">Atsisiuskite PDF faila</a> 


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
