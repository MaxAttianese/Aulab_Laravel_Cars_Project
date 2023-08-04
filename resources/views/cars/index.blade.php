<x-main>
    <x-slot:title>Parco Auto</x-slot>
        <div class="pt-5 mt-5 text-center">
            <h2 class="fw-bold fst-italic pt-2">{{config('app.name')}}</h2>
        </div>

        <div class="container pt-1 pb-5">
            <div class="row">
             
            @if(auth()->user())
                <div class="text-end p-5">
                    <a class="ms-3 btn btn-primary" href="{{route('cars.create')}}">Aggiungi annuncio</a>
                </div>
                @endif

                <x-flashmessage />

                @foreach($cars as $car)
                <div class="col-12 col-md-3 p-3">
                    <div class="card" style="width: 18rem;">
                        <div class="position-relative">
                        @if($car->image)
                        <img src="{{Storage::url($car->image)}}" class="card-img-top img-fluid" style="height: 180px" alt="{{$car->model}}">
                        @else
                        <img src="https://montagnolirino.it/wp-content/uploads/2015/12/immagine-non-disponibile.png" class="card-img-top img-fluid" alt="Immagine non disponibile">
                        @endif

                        @if($car->buyer)
                        <div class="position-absolute top-0 end-0 index-1"> <button class="btn btn-danger">Venduta</button></div>
                        @endif
                        </div>
                        <div class="card-body">
                            <span class="small fst-italic">{{$car->engine->name}}</span>
                            <h5 class="card-title pt-2 fst-italic">{{$car->brand->name}}</h5>
                            <h4 class="card-title text-center py-3">{{$car->model}}</h4>
                            <a href="{{route('cars.show', $car)}}" class="btn btn-sm btn-primary">Dettagli</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
</x-main>