@extends('layouts.main')
@section('content')
    <style type="text/css">

        tfoot{        display:table-header-group;
        }
    </style>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Liste des trips</h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                <label>Ligne</label>
                <select class="form-control select2" style="width: 20%;" name="ligne_id" id="ligne_id" onchange="recupe(this.value)">
                   <option value=""> Select</option>
                    @foreach(App\Ligne::all() as $ligne)
                        <option value="{{$ligne->id}}">{{$ligne->ligne_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Route</label>
                <select onchange="getTripsByRoute(this.value)" disabled class="form-control select2" style="width: 20%;" name="route_id" id="route_id">

                </select>
            </div>
            <table  class="table table-bordered table-striped" id="example">
                <tfoot>
                <th>trip name</th>
                </tfoot>
                <thead>
                <tr>
                    <th>trip name</th>
                    <th>service</th>
                    <th>route</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="trips">


                </tbody>

            </table>

        </div>
    </div>
</section>
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

        var routes_url="{{route('getRoutesByLigne')}}";
        var trips_url="{{route('getTripsByRoute')}}";
        var edit_trip_url = "{{url('trips/')}}";
        var delete_trip_url = "{{url('trips/')}}";
        function recupe(value) {
            $.post(routes_url,{_token:"{{csrf_token()}}",ligne_id:value}, function (res) {
                console.log(res);
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
                        html+= `<tr> <td>`+trip.trip_name+` </td> <td></td>
        <td> `+trip.route.route_name+`</td>
            <td> <a href='`+edit_trip_url+'/'+trip.id+`/edit'><button class="btn btn-warning">Modifier</button></a>

            <button type="button" onclick="deleteTrip(`+trip.id+`,event)" class="btn btn-danger">Supprimer</button> </td> </tr> `;

                    });
                    $('#trips').html(html);



                });

            }
        }
        function deleteTrip(trip_id,element) {

            $.get(delete_trip_url+'/'+trip_id+'/delete', function (res) {
                if(res.status) {
                    var el= element.target;
                    $(el).parent().parent().fadeOut(500,function() {
                        $(this).remove();
                    });

                }

            });
        }

    </script>


@endsection
