<x-main>
    <x-slot:title>Accessori</x-slot>
        <div class="pt-5 mt-5 text-center">
            <h2 class="fw-bold fst-italic pt-2">{{config('app.name')}}</h2>
        </div>

        <div class="container pt-1 pb-5">
            <div class="row">
             
                @if(auth()->user())
                <div class="text-end p-4">
                    <a class="ms-1 btn btn-primary" href="{{route('extras.create')}}">Aggiungi optional</a>
                </div>
                @endif



                <div class="col-0 col-md-4"></div>
                <div class="col-12 col-md-4">

                    <x-flashmessage />

                    <h2 class="fst-italic pb-3">Elenco accessori:</h2>
                    <table>
                        <tr>
                            <th class="fs-5 fst-italic pe-5"><span>Nome</span></th>
                            <th class="fs-5 fst-italic pe-5"><span class="ps-2">Prezzo</span></th>
                        </tr>
                        @foreach($extras as $extra)
                        <tr class="border-top border-bottom">
                            <td><span class="small fst-italic">. {{$extra->name}}</span></td>
                            <td><span class="ps-4">{{\App\Custom\Price::formatPrice($extra->price)}}</span></td>
                            <td class="d-flex py-2"><a href="{{route('extras.edit', $extra)}}" class="btn btn-sm btn-primary me-3">Modifica</a> <form action="{{route('extras.destroy', $extra)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                            </form></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-0 col-md-4"></div>

            </div>
        </div>
</x-main>