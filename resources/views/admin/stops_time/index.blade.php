@extends('layouts.main')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Horaires</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box-body">
                <div class="form-group">
                    <label>transport</label>
                    <select class="form-control select2" style="width: 10%;" name="transport_id" id="transport_id" onchange="recupe(this.value)">
                        @foreach(App\Transport_type::all() as $type)
                            <option value="{{$type->id}}">{{$type->transport_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Ligne</label>
                    <select disabled class="form-control select2" style="width: 10%;" name="ligne_id" id="ligne_id" onchange="recupe2(this.value)">

                    </select>
                </div>
                <div class="form-group">
                    <label>Route</label>
                    <select onchange="getTripsByRoute(this.value)" disabled class="form-control select2" style="width: 20%;" name="route_id" id="route_id">
                    </select>
                </div>
                <table  class="table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th>N°Trip</th>
                    @foreach($routeStops as $routeStop)
                            @if($routeStop->stop->transport_id==3)
                                <th>{{ $routeStop->stop->stop_name }}</th>
                            @endif
                        @endforeach
                    </tr>
                    </thead>
                    <tbody id="trips" >
                        <tr>
                            @foreach($stop_times as $stop_time)
                                @if($trip->id == $stop_time->trip_id)
                                    @if($stop_time->arrived_time!='00:00:00')
                                        <td> {{$stop_time->arrived_time}}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                @endif
                            @endforeach
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>

        </div>


    </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script >
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

        var lignes_url="{{route('getLignesByTransport')}}";
        function recupe(value) {
            $.post(lignes_url, {_token: "{{csrf_token()}}", transport_id: value}, function (res) {
                $('#ligne_id').prop('disabled',false);
                $('#ligne_id').html(res.html);
            });
        };

        var routes_url="{{route('getRoutesByLigne')}}";
        function recupe2(value) {
            $.post(routes_url,{_token:"{{csrf_token()}}",ligne_id:value}, function (res) {
                $('#route_id').prop('disabled',false);
                $('#route_id').html(res.html);

            });

        };
        function getTripsByRoute(route_id) {
            if(route_id.trim().length>0) {
                $.post(trips_url,{_token:"{{csrf_token()}}",route_id:route_id}, function (res) {
                    console.log(res);
                    var html = '';
                    $.each(res.trips,function (index,trip) {
                        html+= `<td>`+trip.trip_name+` </td>`;

                    });
                    $('#trips').html(html);



                });

            }
        }

    </script>
@endsection
