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
                        <h3 class="box-title">Nouveau station</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('stops.store') }}">

                        {{ csrf_field() }}

                        <div class="box-body" id="global">

                            <div id="gauche">

                                <div id="map"></div>

                            </div>

                            <div id="droite"   >
                                <div class="form-group">
                                    <label for="stop_name"> stop name</label>
                                    <input type="text" class="form-control" name="stop_name" id="stop_name" placeholder="stop_name">
                                </div>

                                <div class="form-group">
                                    <label for="stop_lat">stop_lat</label>
                                    <input type="text" class="form-control" value="" name="stop_lat" id="lat" placeholder="stop_lat">
                                </div>

                                <div class="form-group">
                                    <label for="stop_lon">stop_lon</label>
                                    <input type="text" value="" class="form-control" name="stop_lon" id="lng" placeholder="stop_lon">
                                </div>
                                <div class="form-group">
                                    <label>Transport</label>
                                    <select class="form-control select2" style="width: 100%;" name="transport_id" id="transport_id">
                                        @foreach(App\Transport_type::all() as $transport)
                                            <option value="{{$transport->id}}">{{$transport->transport_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Confirmer</button>
                                </div>
                            </div>


                        </div>

                    </form>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </section>
    <script>

        function initMap() {
            // Map options

            var options = {
                zoom: 8,
                center: new google.maps.LatLng(36.7379281, 10.1045872),
                draggingCursor: 'pointer',
                panControl: false,
            }
            // New map
            var map = new google.maps.Map(document.getElementById('map'), options);
            // Listen for click on map
            google.maps.event.addListener(map, 'click', function (event) {
                // Add marker
                addMarker({coords: event.latLng});
                var markerLat = (event.latLng.lat()).toFixed(6);
                var markerLng = (event.latLng.lng()).toFixed(6);
                $("#coordlist").append("new google.maps.LatLng(" + markerLat + ", " + markerLng + "), <br/>");
                $("#lng").val(markerLng);
                $("#lat").val(markerLat);
            });
            // Add marker
            var marker = new google.maps.Marker({
                position: {lat: 36.8189700, lng: 10.1657900},
                map: map,
                icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
            });
            var infoWindow = new google.maps.InfoWindow({
                content: '<h1>Tunis</h1>'
            });

            // Add Marker Function
            function addMarker(props) {
                var marker = new google.maps.Marker({
                    position: props.coords,
                    map: map,
                    icon:props.iconImage
                });

                // Check for customicon
                if (props.iconImage) {
                    // Set icon image
                    marker.setIcon(props.iconImage);
                }

                // Check content
                if (props.content) {
                    var infoWindow = new google.maps.InfoWindow({
                        content: props.content
                    });

                    marker.addListener('click', function () {
                        infoWindow.open(map, marker);
                    });
                }
            }

        }
    </script>
    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCICVFZg9PawAeVO5oH_BRdE7IEu93eG8E&callback=initMap">
    </script>
@endsection