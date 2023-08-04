<x-main>
    <x-slot:title>{{$titlePage}}</x-slot>
        <div class="pt-5 mt-5 text-center">
            <h2 class="fw-bold fst-italic pt-2 pb-5">{{config('app.name')}}</h2>
        </div>

        <div class="container">
            <div class="row">
            @if($typeForm)
            <div class="pt-2 pb-1">
                <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary fst-italic" href="{{route('extras.index')}}">Indietro</a>
            </div>
            @endif
                <div class="col-0 col-md-4"></div>
                <div class="col-12 col-md-4">
                    <h3 class="fst-italic ps-1 pb-2">{{$titlePage}}</h3>
                    <form class="py-3" action="{{$action}}" method="POST">
                        @csrf

                        @if($typeForm)
                        @method('PUT')
                        @endif

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nome categoria" value="{{old('name', $extra->name)}}">
                            <label class="fst-italic" for="price">Nome categoria</label>
                            @error("name") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" min="0" name="price" id="price" placeholder="Prezzo" value="{{old('price', $extra->price)}}">
                            <label class="fst-italic" for="price">Prezzo</label>
                            @error("price") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary fst-italic">{{$buttoName}}</button>
                    </form>
                </div>
                <div class="col-0 col-md-4"></div>
            </div>
        </div>
</x-main>