@extends('layouts.main')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Liste des utilisateurs</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <table id="products-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)

                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"> <i class="glyphicon glyphicon-edit icon-white"></i> Modifier</a>
                            <a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger"> <i class="glyphicon glyphicon-trash icon-white"></i> Supprimer</a>
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
        $('#products-table').DataTable({"bLengthChange":false
        });
    </script>

@endsection
