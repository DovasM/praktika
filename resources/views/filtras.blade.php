<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meniu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
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

                            @foreach ($filtras as $filtr)

                                <tr class="border-2 hover:bg-gray-100">
                                    <td class="border-2 p-2 form-control filter-select" data-column="0">{{$filtr->name}} {{$filtr->last_name}}</td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="1">{{$filtr->fakultetas}}</td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="1">{{$filtr->katedra}}</td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="2">{{$filtr->kryptis}}</td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="3">{{$filtr->programa}}</td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="4">
                                    @if (date('o')-3==date('o', strtotime($filtr->Metai)))
                                            @if ($filtr->Stud_ID===Auth::user()->id || Auth::user()->roles===1)
                                                <a href="post/{{$filtr->id}}/edit">{{$filtr->Universitetas}} </a> ; <br> <hr>
                                                <form action="/post/{{$filtr->id}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                    class="border-b-2 pb-1 border-dotted italic text-red-500"
                                                    type="submit">Pašalinti &rarr;</button>
                                                </form>
                                            @endif
                                    @endif
                                    </td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="4">
                                    @if (date('o')-2==date('o', strtotime($filtr->Metai)))
                                            @if ($filtr->Stud_ID===Auth::user()->id || Auth::user()->roles===1)
                                                <a href="post/{{$filtr->id}}/edit">{{$filtr->Universitetas}} </a> ; <br> <hr>
                                                <form action="/post/{{$filtr->id}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                    class="border-b-2 pb-1 border-dotted italic text-red-500"
                                                    type="submit">Pašalinti &rarr;</button>
                                                </form>
                                            @endif
                                    @endif
                                    </td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="4">
                                    @if (date('o')-1==date('o', strtotime($filtr->Metai)))
                                            @if ($filtr->Stud_ID===Auth::user()->id || Auth::user()->roles===1)
                                                <a href="post/{{$filtr->id}}/edit">{{$filtr->Universitetas}} </a> ; <br> <hr>
                                                <form action="/post/{{$filtr->id}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                    class="border-b-2 pb-1 border-dotted italic text-red-500"
                                                    type="submit">Pašalinti &rarr;</button>
                                                </form>
                                            @endif
                                    @endif
                                    </td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="4">
                                    @if (date('o')==date('o', strtotime($filtr->Metai)))
                                            @if ($filtr->Stud_ID===Auth::user()->id || Auth::user()->roles===1)
                                                <a href="post/{{$filtr->id}}/edit">{{$filtr->Universitetas}} </a> ; <br> <hr>
                                                <form action="/post/{{$filtr->id}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                    class="border-b-2 pb-1 border-dotted italic text-red-500"
                                                    type="submit">Pašalinti &rarr;</button>
                                                </form>
                                            @endif
                                    @endif
                                    </td>


                                </tr>

                            @endforeach

                          </table>



            <div class="py-12 m-4">
                <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden sm:rounded-lg shadow-2xl">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="invoice/export" method="GET">
@foreach ($filtras as $key => $filtr)
<input type="hidden" name="f[{{$key}}][id]" value="{{$filtr->id}}">
<input type="hidden" name="f[{{$key}}][name]" value="{{$filtr->name}}">
<input type="hidden" name="f[{{$key}}][last_name]" value="{{$filtr->last_name}}">
<input type="hidden" name="f[{{$key}}][email]" value="{{$filtr->email}}">
<input type="hidden" name="f[{{$key}}][fakultetas]" value="{{$filtr->fakultetas}}">
<input type="hidden" name="f[{{$key}}][katedra]" value="{{$filtr->katedra}}">
<input type="hidden" name="f[{{$key}}][kryptis]" value="{{$filtr->kryptis}}">
<input type="hidden" name="f[{{$key}}][programa]" value="{{$filtr->programa}}">
<input type="hidden" name="f[{{$key}}][Salis]" value="{{$filtr->Salis}}">
<input type="hidden" name="f[{{$key}}][Universitetas]" value="{{$filtr->Universitetas}}">
<input type="hidden" name="f[{{$key}}][Metai]" value="{{$filtr->Metai}}">

@endforeach



                                <button
                                class="border-b-2 pb-1 border-dotted italic text-red-500"
                                type="submit">Export &rarr;</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



                </span>

                </div>
            </div>

            <div class="py-12 m-4">
                <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden sm:rounded-lg shadow-2xl">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="/filtras" method="get">
                                <input type="text" name="name"  placeholder="name"/>
                                <input type="text" name="last_name"  placeholder="last_name"/>
                                <input type="text" name="email"  placeholder="email"/>
                                <hr>
                                <input type="text" name="Salis"  placeholder="Salis"/>
                                <input type="text" name="Universitetas"  placeholder="Universitetas"/>
                                <input type="text" name="Metai"  placeholder="Metai"/>
                                <hr>
                                <input type="text" name="katedra"  placeholder="katedra"/>
                                <input type="text" name="kryptis"  placeholder="kryptis"/>
                                <input type="text" name="programa"  placeholder="programa"/>
                                <hr>
                                <input type="submit" value="Search"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
