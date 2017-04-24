<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon">

    <title>Study @yield('title')</title>

    @include('partials._styles')
    @yield('specific_styles')
</head>
<body>

    <div id="main-canvas" class="container flex-parent-row">

        <div id="score-canvas" class="flex-item-score-canvas">
            @yield('score')
        </div>

        <div id="content-canvas" class="flex-item-content-canvas box box-white">
            @yield('content')
        </div>

    </div>

@include('partials._scripts')
@yield('specific_scripts')
</body>
</html>