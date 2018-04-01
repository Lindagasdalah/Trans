@extends('layouts.main')

@section('content')

    <style type="text/css">

        tfoot{        display:table-header-group;
        }
    </style>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Liste des agences</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <a href="{{ route('agences.create') }}" class="btn btn-default" ><i class="glyphicon glyphicon-plus icon-white"></i>   Ajouter</a>



            <table  class="table table-bordered table-striped" id="example" >
                <tfoot>
                <th>Nom de l'agence</th>
                <th>Adresse de l'agence</th>
                </tfoot>
                <thead>
                <tr>
                    <th>Nom de l'Agence</th>
                    <th>Adresse de l'Agence</th>
                    <th style="width: 25%" >Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($agences as $agence)

                    <tr>
                        <td>{{ $agence->agence_name }}</td>
                        <td>{{ $agence->agence_adresse }}</td>
                        <td>
                            <a href="{{ route('agences.edit', $agence->id) }}" class="btn btn-warning" ><i class="glyphicon glyphicon-edit icon-white"></i>   Modifier</a>
                            <a href="{{ route('agences.delete', $agence->id) }}" class="btn btn-danger" ><i class="glyphicon glyphicon-trash icon-white" ></i>  Supprimer</a>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script >
        $(document).ready(function() {
            $('#example').DataTable( {
                "bLengthChange":false,
                paginate:false,
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
