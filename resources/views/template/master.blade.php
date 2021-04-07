<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TechBulb - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    @yield('content-css')
</head>
<body style="background-color: #2e2e2e">
    @php
        use App\Models\NodeMCU\Lamp;
        
        $lamp = Lamp::get()->first();
    @endphp

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="mx-3 navbar-brand" href="{{ route('home') }}">
                @if ($lamp->on)
                        <i class="bi bi-lightbulb-off-fill"></i>
                @else
                    <i class="bi bi-lightbulb-fill"></i>
                @endif
                TechBulb
              </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">
                    <i class="fas fa-sliders-h"></i>
                    Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('schedule') }}">
                  <i class="fas fa-stopwatch"></i>
                  Horário
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('historic') }}">
                  <i class="fas fa-history"></i>
                  Histórico
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    
    <div class="container-fluid">
        @yield('content')
    </div>
    
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    @yield('content-js')
</body>
</html>
