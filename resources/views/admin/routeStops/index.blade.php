
@extends('layouts.main')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Liste des Station Selon les routes </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">


            <table  class="table table-bordered table-striped" id="example">
                <thead>
                <tr>
                    <th>Route name</th>
                    <th>Station name</th>
                    <th>Ordre</th>
                </tr>
                </thead>
                <tbody>

                @foreach($routeStops as $routeStop)

                    <tr>
                        <td>{{ $routeStop->route->route_name }}</td>
                        <td>{{ $routeStop->stop->stop_name }}</td>
                        <td>{{ $routeStop->ordre }}</td>

                    </tr>

                @endforeach

                </tbody>
                <tfoot>
                <th>Route name</th>
                <th>Station name</th>
                </tfoot>
            </table>

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

    @endsection