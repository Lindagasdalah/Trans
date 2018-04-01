@extends('layouts.main')
@section('content')
    <style>
        #map{
            height:560px;
            width:100%;
        }
        #global{
            width:100%;
        }
        #gauche {
            float:left;
            width:70%;

        }
        #droite {
            margin-left:75%

        }
    </style>
    <section class="content" >
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="box box-primary" >
                    <div class="box-header with-border">
                        <h3 class="box-title">Nouvelle Route</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('routes.store') }}">

                        {{ csrf_field() }}

                        <div class="box-body" id="global">

                            <div id="gauche">

                                <div id="map"></div>

                            </div>

                            <div id="droite"   >
                                <div class="form-group">
                                    <label for="route_Sname">Name</label>
                                    <input type="text" class="form-control" name="route_name" id="route_name" placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <label for="route_color">Color</label>
                                    <input type="color" id="colorWell"  class="form-control" name="route_color"  placeholder="Color">
                                </div>

                                <div class="form-group">
                                    <label for="coordonne">Coordonné</label>
                                    <textarea cols="50" rows="10" class="form-control" name="coordonne" id="coord" placeholder="coordonne"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Ligne</label>
                                    <select class="form-control select2" style="width: 100%;" name="ligne_id" id="ligne_id">
                                        @foreach(App\Ligne::all() as $ligne)
                                            <option value="{{$ligne->id}}">{{$ligne->ligne_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Confirmer</button>
                                </div>
                            <!-- /.box-body -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </section>
    <script>
       /* var defaultColor = "#0000ff";
        function updateFirst(event) {
            var colorWell = document.querySelector("#colorWell");
            if (colorWell) {
                colorWell.value = event.target.value;
            }
        }function updateAll(event) {
            document.querySelectorAll("colorWell").forEach(function(colorWell) {
                colorWell.value = event.target.value;
            });
        }*/
        var poly;
        var map;
            function initMap() {

                var locations =  {!! $latlng !!};
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 7,
                    center: {lat: 36.8189700, lng: 10.1657900}  // Center the map on Chicago, USA.
                });
             /*   var colorWell = document.querySelector("#colorWell");*/
                var colorWell = document.getElementById("colorWell");
                poly = new google.maps.Polyline({
                    strokeColor: colorWell.value,
                    strokeOpacity: 1.0,
                    strokeWeight: 3 });
                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i]['stop_lat'], locations[i]['stop_lon']),
                        map: map
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(locations[i]['stop_name']);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));}
                poly.setMap(map);
                // Add a listener for the click event
                map.addListener('click', addLatLng);
            }
var chaine="";
            // Handles click events on a map, and adds a new point to the Polyline.
            function addLatLng(event) {
                var path = poly.getPath();
                // Because path is an MVCArray, we can simply append a new coordinate
                // and it will automatically appear.
                path.push(event.latLng);
                var markerLat = (event.latLng.lat()).toFixed(6);
                var markerLng = (event.latLng.lng()).toFixed(6);
                if (event)
                chaine= chaine+markerLat+","+markerLng+";";
                $("#coord").val(chaine);
                // Add a new marker at the new plotted point on the polyline.
                var marker = new google.maps.Marker({
                    position: event.latLng,
                    title: '#' + path.getLength(),
                    map: map
                });}

    </script>
    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCICVFZg9PawAeVO5oH_BRdE7IEu93eG8E&callback=initMap">
    </script>
@endsection