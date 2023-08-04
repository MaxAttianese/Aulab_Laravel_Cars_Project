<x-main>
    <x-slot:title>Registrati</x-slot>
        <div class="container pt-5 mt-3">
            <div class="row pt-5">
                <div class="col-0 col-md-4"></div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-center fst-italic pb-3">Registrati</h2>
                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Max">
                            <label class="fst-italic" for="name">Nome</label>
                            @error("name") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                      <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                            <label class="fst-italic" for="email">Email</label>
                            @error("email") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <label class="fst-italic" for="password">Password</label>
                            @error("password") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password">
                            <label class="fst-italic" for="password_confirmation">Conferma Password</label>
                            @error("password") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>  

                        <button type="submit" class="btn btn-secondary fst-italic">Registrati</button>
                    </form>
                </div>
                <div class="col-0 col-md-4"></div>
            </div>
        </div>
</x-main>