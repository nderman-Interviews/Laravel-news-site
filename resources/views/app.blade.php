<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <div class="navbar navbar-default"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>@yield('title')</h1>
                    </div>
                    <div class="panel-body">
                        @yield('content')
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
            @if (Session::has('message'))
            <div class="flash alert-info">
                <p class="panel-body">
                    {{ Session::get('message') }}
                </p>
            </div>
            @endif
            @if ($errors->any())
            <div class='flash alert-danger'>
                <ul class="panel-body">
                    @foreach ( $errors->all() as $error )
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>
</body>
</html>
