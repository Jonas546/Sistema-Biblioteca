<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/menu.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <script src="{{asset('js/gijgo.min.js')}}" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular-route.min.js"></script>

        <style>body{background-color: #f5f5f5;} .container{background-color: #FFF;}</style>
        
    </head>
    <body>      
            @include('menu')    
            @yield('content')      
    </body>

</html>