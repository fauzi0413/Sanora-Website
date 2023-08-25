<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}"></script>
  <title>Admin</title>
</head>

<body class="bg-secondary">
  <div class="bg-white container-sm col-6 border my-3 rounded px-5 py-3 pb-5">
    <h1>Halo!!</h1>
    <div>Selamat datang di halaman admin</div>
    <div><a href="/logout" class="btn btn-sm btn-secondary">Logout >></a></div>
    <div class="card mt-3">
      <ul class="list-group list-group-flush">
        @if (Auth::user()->role == 'admin')            
        <li class="list-group-item">Menu Admin</li>
        @endif

        @if (Auth::user()->role == 'author')            
        <li class="list-group-item">Menu Author</li>
        @endif
      </ul>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
</body>

</html>