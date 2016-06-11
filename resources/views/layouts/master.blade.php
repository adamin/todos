<html>
    <head>
        <title>App Name - @yield('title')</title>

        <!--  CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ url('/css/styles.css') }}">
        
        <!-- JS -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        <!-- ANGULAR -->
        <script src="{{ url('/js/controllers/taskCtrl.js') }}"></script>
        <script src="{{ url('/js/controllers/noteCtrl.js') }}"></script>
        <!--<script src="js/services/noteService.js"></script>-->
        <script src="{{ url('/js/app.js') }}"></script>

        <meta name="csrf_token" content="{ csrf_token() }" />
    </head>
    <body ng-app="app">
        @include('layouts.navbar')

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>