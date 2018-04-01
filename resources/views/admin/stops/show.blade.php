@extends('layouts.main')

@section('content')
    <style>

        #map{
            height:400px;
            width:100%;
        }
    </style>
    <section class="content">
        <div class="row">

            <!-- left column -->
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Détails station</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="map"></div>

                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </section>

@endsection

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCICVFZg9PawAeVO5oH_BRdE7IEu93eG8E&callback=initMap"></script>

<script>

    function initMap(){


        var lng= {!! $stop->stop_lat !!};
        var lon={!! $stop->stop_lon !!};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: new google.maps.LatLng(lng, lon),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow({
            content:
        '<?php echo $stop->stop_name?>'});

        var marker;

        marker = new google.maps.Marker({
            position: new google.maps.LatLng(lng,lon),
            map: map
        });

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);


        });

    }
</script>