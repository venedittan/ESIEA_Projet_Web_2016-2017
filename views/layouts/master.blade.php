 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
     <title>Blog</title>

{{ HTML::style('bootstrap.css') }}


  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ URL::route('home') }}">Accueil</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            @if(Auth::Check())
            <li class="nav-item active">
              <a class="nav-link" href="{{ URL::route('home.admin') }}">Administration
                <span class="sr-only">(current)</span>
              </a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ URL::route('users.login') }}">Se Connecter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ URL::route('users.register') }}">S’Enregistrer</a>
            </li>
            @endif
            @if(Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="{{ URL::route('users.logout') }}">Se Déconnecter</a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-inverse navbar-dark bg-dark ">
    </div>
    </nav>


</br>
</br>
</br>


    <div class="container">
      @if(Session::has('error'))
      <div class="alert alert-danger">{{ Session::get('error') }}</div>
      @endif
      @if(Session::has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif

@if(Auth::check())
    @if(Auth::user()->is_admin)
      <div class="alert alert-success">Vous êtes admin</div>
    @else
      <div class="alert alert-success">Vous n'êtes qu'un simple membre</div>
    @endif
@else
      <div class="alert alert-success">Vous n'êtes pas authentifié</div>
@endif

    @yield('content')

    </div>

    {{ HTML::script('https://code.jquery.com/jquery-3.2.1.slim.min.js')}}
    {{ HTML::script('bootstrap.js') }}

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
