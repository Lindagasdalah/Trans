@extends('layouts.main')

@section('content')
    <style type="text/css">

        tfoot{        display:table-header-group;
        }
    </style>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Liste des lignes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example"  class="table table-bordered table-striped">
                <tfoot>
                    <th>nom ligne</th>
                    <th>transport</th>
                    <th>agence</th>

                </tfoot>
                <thead>
                <tr>
                    <th>nom ligne</th>
                    <th>transport</th>
                    <th>agence</th>
                    <th style="width: 25%">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($lignes as $ligne)

                    <tr>
                        <td>{{ $ligne->ligne_name }}</td>
                        <td>{{ $ligne->transport->transport_name }}</td>
                        <td>{{ $ligne->agence->agence_name }}</td>
                        <td>
                            <a href="{{ route('lignes.edit', $ligne->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('lignes.delete', $ligne->id) }}" class="btn btn-danger">Supprimer</a>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

    <script src="{{ asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $('#products-table').DataTable();
    </script>
    <script >
        $(document).ready(function() {
            $('#example').DataTable( {
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
