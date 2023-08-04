<x-main>
    <x-slot:title>Parco Auto</x-slot>
        <div class="pt-5 mt-5 text-center">
            <h2 class="fw-bold fst-italic pt-2 pb-5">{{config('app.name')}}</h2>
        </div>

        <div class="container">
            <div class="row">
                @if($typeForm)
                <div class="pt-2 pb-1">
                    <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary fst-italic" href="{{route('cars.show', $car)}}">Indietro</a>
                </div>
                @endif
                <div class="col-0 col-md-4"></div>
                <div class="col-12 col-md-4">
                    <h3 class="fst-italic ps-1 pb-2">{{$titlePage}}</h3>
                    <form class="py-3" action="{{$action}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if($typeForm)
                        @method('PUT')
                        @endif

                        <div class="form-floating mb-3">
                            <div class="form-floating fst-italic">
                                <select class="form-select fst-italic" id="floatingSelect" name="brand_id" aria-label="Floating label select example">
                                    @if($typeForm)
                                    <option selected class="fst-italic" value="{{old('brand_id', $car->brand->id)}}">Marca: {{old('brand_id', $car->brand->name)}}</option>
                                    @else
                                    <option selected class="fst-italic" value="{{old('brand_id')}}">Marca:</option>
                                    @endif
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect fst-italic">Marca</label>
                                @error("brand_id") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="model" id="model" placeholder="Modello" value="{{old('model', $car->model)}}">
                            <label class="fst-italic" for="model">Modello</label>
                            @error("model") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-floating mb-4">
                            <div class="form-floating fst-italic">
                                <select class="form-select fst-italic" id="floatingSelect" name="engine_id" aria-label="Floating label select example">
                                    @if($typeForm)
                                    <option selected class="fst-italic" value="{{old('engine_id', $car->engine->id)}}">Marca: {{old('engine_id', $car->engine->name)}}</option>
                                    @else
                                    <option selected class="fst-italic" value="{{old('engine_id')}}"> Motore: </option>
                                    @endif
                                    @foreach($engines as $engine)
                                    <option value="{{$engine->id}}">{{$engine->name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect fst-italic">Motore</label>
                            </div>
                            @error("engine_id") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div>
                            <input type="file" class="form-control" name="image" id="image">
                            <label class="fst-italic" for="image"></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" min="0" name="price" id="price" placeholder="Prezzo" value="{{old('model', $car->price)}}">
                            <label class="fst-italic" for="price">Prezzo</label>
                            @error("price") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="py-3">
                        @foreach($extras as $extra)
                        <div class="form-check form-switch pb-3">
                            <input class="form-check-input" type="checkbox" name= "extras[]" role="switch" id="flexSwitchCheckDefault" value="{{$extra->id}}" @checked($car->extras->contains($extra->id))>
                            <label class="form-check-label" for="flexSwitchCheckDefault">{{$extra->name}}</label>
                        </div>
                        @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary fst-italic">{{$buttoName}}</button>
                    </form>
                </div>
                <div class="col-0 col-md-4"></div>
            </div>
        </div>
</x-main>