<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>{{env('APP_NAME')}}</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('session')}}">Sessions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Apprenants</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('competence')}}">Compétences</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">Se déconnecter</a>
                </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">S'inscrire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Se connecter</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('js/app.js') }}" defer></script>
  </body>
</html>
