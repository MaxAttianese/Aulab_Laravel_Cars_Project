<x-main>
    <x-slot:title>{{$car->brand->name}} - {{$car->model}}</x-slot>
        <div class="pt-5 mt-5 text-center">
            <h2 class="fw-bold fst-italic pt-2">{{config('app.name')}}</h2>
        </div>




        <div class="container pt-1 pb-5">
            <div class="row">

                <div class="pt-4">
                    <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary fst-italic" href="{{route('cars.index')}}">Indietro</a>
                </div>

                @if(auth()->user())
                <div class="d-flex justify-content-between align-items-center p-5">
                    <a class="ms-3 btn btn-secondary" href="{{route('cars.edit', $car)}}">Modifica annuncio</a>
                    <form action="{{route('cars.destroy', $car)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Sicuro di volerlo eliminare?')">Elimina Annuncio</button>
                    </form>
                    <a class="ms-3 btn btn-primary" href="{{route('cars.create')}}">Aggiungi annuncio</a>
                </div>
                @endif

                <x-flashmessage />

                <div class="col-0 col-md-1"></div>
                <div class="col-12 col-md-10 p-3">

                    <div class="row d-flex align-items-center">
                        <div class="col-12 col-md-5 position-relative">
                            @if($car->image)
                            <img src="{{Storage::url($car->image)}}" class="img-fluid" alt="{{$car->model}}">
                            @else
                            <img src="https://montagnolirino.it/wp-content/uploads/2015/12/immagine-non-disponibile.png" class="img-fluid" alt="Immagine non disponibile">
                            @endif

                            @if($car->buyer)
                            <div class="position-absolute top-0 end-0 pe-2"> <button class="btn btn-danger">Venduta</button></div>
                            @endif
                        </div>
                        <div class="col-12 col-md-4 ps-5 border-end">
                            <div>
                                <span class="fst-italic small">Marca:</span>
                                <h2 class="text-center">{{$car->brand->name}}</h2>
                            </div>
                            <div>
                                <span class="fst-italic small">Modello:</span>
                                <h2 class="text-center">{{$car->model}}</h2>
                            </div>
                            <div>
                                <span class="fst-italic small">Motore:</span>
                                <p class="text-center fs-5">{{$car->engine->name}}</p>
                            </div>
                            <div>
                                <span class="fst-italic small">Prezzo:</span>
                                <p class="text-center fs-5">{{\App\Custom\Price::formatPrice($car->price)}}</p>
                            </div>

                        </div>
                        <div class="col-12 col-md-3 ps-5">
                            <p class="fst-italic small m-0">Extra:</p>
                            @foreach($car->extras as $extra)
                            <div class="pt-3"><span class="fst-italic">.{{$extra->name}}:</span> <p class="fw-bold m-0 text-end">{{\App\Custom\Price::formatPrice($extra->price)}}</p></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-0 col-md-1"></div>
                </div>

                <div class="row pt-3">
                    <div class="col-0 col-md-6"></div>
                    <div class="col-12 col-md-2 fw-bold ps-5 fs-4 text-center">
                        <span class="fst-italic">Prezzo Totale:</span>
                        <p class="fs-2">{{\App\Custom\Price::formatPrice($car->price + $extrasTotalPrice)}}</p>
                    </div>
                    <div class="col-0 col-md-4"></div>
                </div>
            </div>


            <div class="row pt-5 mt-5">
                <div class="col-0 col-md-3"></div>
                <div class="col-12 col-md-6">
                    <h2 class="fw-bold text-center fst-italic pb-4">Acquista Auto</h2>
                    <form action="{{route('buyer.update', $car)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="firstname" id="floatingInput" placeholder="Max">
                            <label class="fst-italic" for="firstname">Nome</label>
                            @error("firstname") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="lastname" id="floatingPassword" placeholder="Attianese">
                            <label class="fst-italic" for="lastname">Cognome</label>
                            @error("lastname") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="pt-2 d-flex justify-content-between"><button type="submit" class="btn btn-primary fst-italic">Acquista</button> 
                        @if(auth()->user() && $car->buyer_id != null) 
                        <form action="route('buyer.destroy', $car)" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-secondary fst-italic">Rinnova Disponibilità</button>
                        </form> 
                        @endif
                        </div>
                        </form>
                </div>
                <div class="col-0 col-md-3"></div>
            </div>

        </div>
</x-main>