<x-main>
    <x-slot:title>Homepage</x-slot>
        <div class="text-center pt-5 mt-5">
            <h2 class="pt-5 mt-5 pb-5 display-1 fw-bold fst-italic">{{config('app.name')}}</h2>
            <div><a class="btn btn-secondary" href="{{route('cars.index')}}">Visita il nostro parco auto</a>
            @if(auth()->user())
            <a class="ms-3 btn btn-primary" href="{{route('cars.create')}}">Aggiungi annuncio</a>
            @endif
        </div>
        </div>

        <div class="text-center pt-5 mt-1 fs-3">
                @if(auth()->user())
                <p class="text-center small fst-italic pe-2 mb-0">Benvenuto:</p><p class="fw-bold text-secondary">{{auth()->user()->name}} - {{auth()->user()->email}}</p>
                @endif
            </div>
</x-main>