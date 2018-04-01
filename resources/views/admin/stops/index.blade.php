@extends('layouts.main')
@section('content')

    <style>

        #map{
            height:700px;
            width:100%;
        }
        #global{
            width:100%;
        }
        #gauche {
            float:left;
            width:45%;
            margin-top: -50%;
        }
        #droite {
            margin-left:50%
        }
    </style>
    <body>
    <div class="box" id="global" >
        <div class="box-header" >
            <h3 class="box-title">Liste des stations</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

        <div id="droite"> <div id="map"></div></div>


        <div id="gauche"  >
            <table id="example" class="table table-bordered table-striped" >
                <thead>
                <tr>
                    <th>stop_name</th>
                    <th>transport_name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stops as $stop)
                    <tr>
                        <td>{{ $stop->stop_name }}</td>
                        <td>{{ $stop->transport->transport_name }}</td>
                        <td>
                            <a href="{{ route('stops.show', $stop->id) }}" class="btn btn-primary" > <i class="glyphicon glyphicon-zoom-in icon-white"></i> Afficher</a>
                            <a href="{{ route('stops.edit', $stop->id) }}" class="btn btn-warning"> <i class="glyphicon glyphicon-edit icon-white"></i>Modifier</a>
                            <a href="{{ route('stops.delete', $stop->id) }}" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Supprimer</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <th>stop_name</th>
                <th>transport_name</th>
                </tfoot>
            </table>
        </div>
    </div>
    </div>
    </body>
@endsection
@section('js')
    <script src="{{ asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
          integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
            integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
            crossorigin=""></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "bLengthChange":false,
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );

                        column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ){
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            } );
        } );


    </script>
<script>

    var locations =  {!! $latlng !!};

    var map = L.map('map', {
        center: [36.81897, 10.16579],
        zoom: 10
    });
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        maxZoom: 28,
    }).addTo(map);

    var marker, i,popup;
    for (i = 0; i < locations.length; i++) {
        marker = L.marker([locations[i]['stop_lat'], locations[i]['stop_lon']]).addTo(map);
        marker.bindPopup(locations[i]['stop_name']);



    }


</script>


@endsection
