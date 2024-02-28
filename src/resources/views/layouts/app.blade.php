<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atte</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @yield('css')
</head>

<body>
  <header class="header__inner">
    <a class="header__title" href="/">Atte</a>
  </header>
<main>
  @yield('content')
</main>
  <footer class="footer__content">
    <div class="credit__column">
      <small class="small__content">Atte,inc.</small>
    </div>
  </footer>
</body>
</html>