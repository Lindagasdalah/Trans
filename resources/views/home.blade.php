@extends('layouts.app')

@section('content')
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TRANSPORT | TUNISIE</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('theme/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('theme/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('theme/dist/css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('theme/dist/css/skins/_all-skins.min.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    </head>
    <style type="text/css">
        .containe{
            margin-left:auto;
            float:center;
            margin-right:auto;
        }
    </style>
    <body >


    </div></br><br/></br><br/>


    <div class="containe">

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6 ">
                <a data-toggle="tooltip" title="6 new members." class="well top-block" href="{{ route('routes.index') }}">
                    <i class="fa fa-map-marker fa-5x"></i>

                    <div>Route</div>
                </a>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-6">
                <a data-toggle="tooltip" title="6 new members." class="well top-block" href="{{ route('agences.index') }}">
                    <i class="fa fa-train fa-5x"></i>

                    <div>Agence</div>
                </a>
            </div>


            <div class="col-md-3 col-sm-3 col-xs-6">
                <a data-toggle="tooltip" title="6 new members." class="well top-block" href="{{ route('stops.index') }}">
                    <i class="fa fa-map-signs fa-5x"></i>

                    <div>Station</div>
                </a>
            </div>
        </div>
        </br><br/>


        <div class=" row">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <a data-toggle="tooltip" title="6 new members." class="well top-block" href="{{ route('lignes.index') }}">
                    <i class="fa fa-map-o fa-5x"></i>

                    <div>Ligne</div>
                </a>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-6">
                <a data-toggle="tooltip" title="6 new members." class="well top-block" href="{{ route('users.index') }}">
                    <i class="fa fa-user-circle fa-5x"></i>

                    <div>Utilisateur</div>
                </a>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-6">
                <a data-toggle="tooltip" title="6 new members." class="well top-block" href="{{ route('stops_time.index') }}">
                    <i class="fa fa-calendar-times-o fa-5x"></i>

                    <div>Planning</div>
                </a>
            </div>
        </div>
    </div>



    </body>
@endsection
