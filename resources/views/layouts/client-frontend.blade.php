<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>F22</title>

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

    <script type="text/javascript" src="/js/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="/jquery-ui-1.12.1.custom/jquery-ui.min.css">
    <script type="text/javascript" src="/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="/css/custom-styles.css">
    <script type="text/javascript" src="/js/client-frontend.js"></script>
</head>
<body class="antialiased">
<div class="container">
    @yield('main-content')
</div>
</body>
</html>
