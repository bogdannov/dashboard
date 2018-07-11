<!doctype html>
<html lang="@yield('language', config('app.locale'))">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- Styles area --}}
    @stack('styles')
</head>
<body class="@yield('body_class')">
    <div class="wrapper">


    {{-- Content area --}}
    @yield('base_content')

    <div class="col-xs-12 alert-section"></div>
    </div>
    @include('dashboard::components._modal')

    {{-- Scripts area --}}
    <script id="data-locale" type="application/json">
        {"locale": "{{App::getLocale()}}"}
    </script>
    <div style="display: none;" id="_token-csrf">{{csrf_token()}}</div>
    @stack('scripts')
</body>
</html>