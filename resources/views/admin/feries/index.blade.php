@extends('layouts.main')

@section('content')
    <style type="text/css">

        tfoot{        display:table-header-group;
        }
    </style>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Jours Féries</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <table id="products-table" class="table table-bordered table-striped">
                <tfoot>
                     <th>jour fériés</th>
                     <th>date</th>
                </tfoot>
                <thead>
                <tr>
                    <th>jour fériés</th>
                    <th>date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($feries as $ferie)

                    <tr>
                        <td>{{ $ferie->ferie_name }}</td>
                        <td>{{ $ferie->ferie_date }}</td>
                        <td>
                            <a href="{{ route('feries.edit', $ferie->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('feries.delete', $ferie->id) }}" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#products-table').DataTable( {
                "bLengthChange":false,
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select><option value="">Filtrer</option></select>')
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
