<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>
    <link href="/css/bootstrap.css" type='text/css' rel='stylesheet'>
    <link href="/css/style.css" type='text/css' rel='stylesheet'>
    @yield('head')
</head>
<body>

    <header>
        <h1>Vector graphic study</h1>
        @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
        @endif
    </header>

    <section class='content-wrapper'>
        <div class='content container'>
            @yield('content','<a href="/">you seem lost...</a>')
        </div>
    </section>

    <footer>
        &copy; {{ date('Y') }} Kevin Burek
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/index.js"></script>

</body>
</html>