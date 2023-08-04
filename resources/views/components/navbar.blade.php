<nav class="navbar navbar-expand-lg bg-secondary shadow fixed-top px-3">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-white" href="/">
      <h1 class="fs-3 m-0 fst-italic">{{config('app.name')}}</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">

      @if(auth()->user())
        @foreach($links as $path => $link)
        <li class="nav-item">
          <a class="nav-link text-white" href="{{$path}}">{{$link}}</a>
        </li>
        @endforeach
        <li>
          <form action="/logout" method="POST">
            @csrf
            <button class="btn bi bi-door-closed-fill text-danger fw-bold" type="submit">Logout</button>
          </form>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link text-white" href="/login">Accedi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/register">Registrati</a>
        </li>
      @endif

      </ul>
    </div>
  </div>
</nav>