<x-main>
    <x-slot:title>Brand</x-slot>
        <div class="pt-5 mt-5 text-center">
            <h2 class="fw-bold fst-italic pt-2">{{config('app.name')}}</h2>
        </div>

        <div class="container pt-1 pb-5">
            <div class="row">
             
                @if(auth()->user())
                <div class="text-end p-4">
                    <a class="ms-1 btn btn-primary" href="{{route('brands.create')}}">Aggiungi Brand</a>
                </div>
                @endif



                <div class="col-0 col-md-4"></div>
                <div class="col-12 col-md-4">
                <x-flashmessage />
                    <h2 class="fst-italic pb-3">Elenco:</h2>
                    <table>
                        <tr>
                            <th class="fs-5 fst-italic pe-5"><span>Nome</span></th>
                        </tr>
                        @foreach($brands as $brand)
                        <tr class="border-top border-bottom">
                            <td><span class="fw-bold fst-italic">. {{$brand->name}}</span></td>
                            <td class="d-flex  ps-5 py-2"><a href="{{route('brands.edit', $brand)}}" class="btn btn-sm btn-primary me-3">Modifica</a> <form action="{{route('brands.destroy', $brand)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sicuro di volerlo eliminare?')">Elimina</button>
                            </form></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-0 col-md-4"></div>

            </div>
        </div>
</x-main>