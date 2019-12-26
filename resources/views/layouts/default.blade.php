<!DOCTYPE html>
<html lang="ja">

<head>
  @section('GoogleAnalytics')
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-153388245-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153388245-1');
  </script>
  @show

  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
  <div class="container">
    @yield('content')
  </div>
</body>

</html>