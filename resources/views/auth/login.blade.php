<x-main>
    <x-slot:title>Accedi</x-slot>
        <div class="container pt-5 mt-3">
            <div class="row pt-5">
                <div class="col-0 col-md-4"></div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-center fst-italic pb-3">Accedi</h2>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                            <label class="fst-italic" for="email">Email</label>
                            @error("email") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                            <label class="fst-italic" for="password">Password</label>
                            @error("password") <span class="small fst-italic text-danger">{{$message}}</span>@enderror
                        </div>

                        <button type="submit" class="btn btn-secondary fst-italic">Accedi</button>
                    </form>
                </div>
                <div class="col-0 col-md-4"></div>
            </div>
        </div>
</x-main>