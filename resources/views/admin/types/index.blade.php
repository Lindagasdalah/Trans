@extends('layouts.main')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Liste des agences</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <table id="products-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>name</th>
                    <th>adresse</th>
                    <th>Action </th>
                </tr>
                </thead>
                <tbody>

                @foreach($agences as $agence)

                    <tr>
                        <td>{{ $agence->agence_name }}</td>
                        <td>{{ $agence->agence_adresse }}</td>
                        <td>
                            <a href="{{ route('agences.show', $agence->id) }}" class="btn btn-primary">Afficher</a>
                            <a href="{{ route('agences.edit', $agence->id) }}" class="btn btn-warning">Modifier</a>
                            <a href="{{ route('agences.delete', $agence->id) }}" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
                <tfoot>

                </tfoot>
            </table>

        </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $('#products-table').DataTable();
    </script>

@endsection
