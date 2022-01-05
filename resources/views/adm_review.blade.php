<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peržiūrėti atsiliepimus') }}
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
                              <th class="border-2">Šalis</th>
                              <th class="border-2">Atsiliepimas</th>
                              <th class="border-2">Laikas</th>
                              <th class="border-2">Ištrinti</th>
                            </tr>
                            <tr>
                                @foreach ($reviews as $review)
                                <tr class="border-2 hover:bg-gray-100">
                                    <td class="border-2 p-2 form-control filter-select" data-column="0">{{$review->atsiliepimai->name}} {{$review->atsiliepimai->last_name}}</td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="1">{{$review->Salis}}</td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="1">{{$review->review}}</td>
                                    <td class="border-2 p-2 form-control filter-select" data-column="1">{{$review->created_at}}</td>
                                    <td>
                                        <form action="/review/{{$review->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button
                                            class="border-b-2 pb-1 border-dotted italic text-red-500"
                                            type="submit">Pašalinti &rarr;</button>
                                        </form>
                                    </td>
                                @endforeach
                            </tr>
                        </table>
                    </span>

                    <form action="review/export" method="GET">
                        @foreach ($reviews as $key => $review)
                        <input type="hidden" name="f[{{$key}}][id]" value="{{$review->id}}">
                        <input type="hidden" name="f[{{$key}}][name]" value="{{$review->atsiliepimai->name}}">
                        <input type="hidden" name="f[{{$key}}][last_name]" value="{{$review->atsiliepimai->last_name}}">
                        <input type="hidden" name="f[{{$key}}][Salis]" value="{{$review->Salis}}">
                        <input type="hidden" name="f[{{$key}}][review]" value="{{$review->review}}">
                        <input type="hidden" name="f[{{$key}}][laikas]" value="{{$review->created_at}}">
                        @endforeach



                                                        <button
                                                        class="border-b-2 pb-1 border-dotted italic text-red-500"
                                                        type="submit">Export &rarr;</button>
                                                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
