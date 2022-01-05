<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meniu') }}
        </h2>
    </x-slot>

    <div class="py-12 col-md-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 col-md-8">
            <div class="bg-white overflow-hidden sm:rounded-lg shadow-2xl">
                <div class="p-6 bg-white border-b border-gray-200">



                    <span class="uppercase text-blue-500 font-bold text-xs italic">
                        <table class="border-2">
                            <tr class="border-2">
                              <th class="border-2">Studentas</th>
                              <th class="border-2">Katedra</th>
                              <th class="border-2">Studijų kryptis</th>
                              <th class="border-2">Studijų programa</th>
                              {{-- Metai --}}
                            @for ($i = 3; $i >= 0; $i--)
                                <th class="border-2">
                                    {{date('o')-$i}}
                                </th>
                            @endfor



                            </tr>
                            @foreach ($users as $user)

                                <tr class="border-2 hover:bg-gray-100">
                                    <td class="border-2 p-2 form-control filter-select" data-column="0">{{$user->name}} {{$user->last_name}}</td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="1">{{$user->studijos->katedra}}</td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="2">{{$user->studijos->kryptis}}</td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="3">{{$user->studijos->programa}}</td>

                                    {{-- Metai "Dabartiniai" -3 --}}
                                    <td class="border-2 p-2 form-control filter-select" data-column="4">
                                        @foreach ($user->posts as $post)
                                            @if (date('o')-3==date('o', strtotime($post->Metai)))
                                            @if ($post->Stud_ID===Auth::user()->id || Auth::user()->roles===1)
                                                <a href="post/{{$post->id}}/edit">{{$post->Universitetas}} </a> ; <br> <hr>
                                                <form action="/post/{{$post->id}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                    class="border-b-2 pb-1 border-dotted italic text-red-500"
                                                    type="submit">Pašalinti &rarr;</button>
                                                </form>
                                            @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    {{-- Metai "Dabartiniai" -2 --}}
                                    <td class="border-2 p-2 form-control filter-select" data-column="5">
                                        @foreach ($user->posts as $post)
                                        @if (date('o')-2==date('o', strtotime($post->Metai)))
                                            @if ($post->Stud_ID===Auth::user()->id || Auth::user()->roles===1)
                                                <a href="post/{{$post->id}}/edit">{{$post->Universitetas}} </a> ; <br> <hr>
                                                <form action="/post/{{$post->id}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                    class="border-b-2 pb-1 border-dotted italic text-red-500"
                                                    type="submit">Pašalinti &rarr;</button>
                                                </form>
                                            @endif
                                        @endif
                                    @endforeach
                                    </td>
                                    {{-- Metai "Dabartiniai" -1 --}}
                                    <td class="border-2 p-2 form-control filter-select" data-column="6">
                                        @foreach ($user->posts as $post)
                                        @if (date('o')-1==date('o', strtotime($post->Metai)))
                                        @if ($post->Stud_ID===Auth::user()->id || Auth::user()->roles===1)
                                                <a href="post/{{$post->id}}/edit">{{$post->Universitetas}} </a> ; <br> <hr>
                                                <form action="/post/{{$post->id}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                    class="border-b-2 pb-1 border-dotted italic text-red-500"
                                                    type="submit">Pašalinti &rarr;</button>
                                                </form>
                                            @endif
                                        @endif
                                    @endforeach
                                    </td>
                                    {{-- Metai "Dabartiniai" --}}
                                    <td class="border-2 p-2 form-control filter-select" data-column="7">
                                        @foreach ($user->posts as $post)
                                        @if (date('o')==date('o', strtotime($post->Metai)))
                                        @if ($post->Stud_ID===Auth::user()->id || Auth::user()->roles===1)
                                        <a href="post/{{$post->id}}/edit">{{$post->Universitetas}} </a> ; <br> <hr>
                                        <form action="/post/{{$post->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button
                                            class="border-b-2 pb-1 border-dotted italic text-red-500"
                                            type="submit">Pašalinti &rarr;</button>
                                        </form>

                                    @endif
                                        @endif
                                    @endforeach
                                    </td>


                                </tr>

                            @endforeach

                          </table>

                </span>

                </div>
            </div>

            <div class="py-12 m-4">
                <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden sm:rounded-lg shadow-2xl">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="/filtras" method="get">
                                <input type="text" name="name"  placeholder="Vardas"/>
                                <input type="text" name="last_name"  placeholder="Pavardė"/>
                                <input type="text" name="email"  placeholder="Email"/>

                                <hr>
                                <input type="text" name="Salis"  placeholder="Šalis"/>
                                <input type="text" name="Universitetas"  placeholder="Universitetas"/>
                                <input type="text" name="Metai"  placeholder="Metai"/>

                                <hr>
                                <input type="text" name="katedra"  placeholder="Katedra"/>
                                <input type="text" name="kryptis"  placeholder="Kryptis"/>
                                <input type="text" name="programa"  placeholder="Programa"/>

                                <hr>
                                <input type="submit" value="Filtruoti"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
