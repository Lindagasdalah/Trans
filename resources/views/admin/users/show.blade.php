@extends('layouts.main')

@section('content')

    <section class="content">
        <div class="row">

            <!-- left column -->
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Détails utilisateur</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-pencil margin-r-5"></i>Name</strong>

                        <p class="text-muted">
                            {{ $user->name}}
                        </p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> email</strong>

                        <p class="text-muted">
                            {{ $user->email }}
                        </p>
                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> password</strong>

                        <p class="text-muted">
                            {{ $user->password }}
                        </p>

                        <hr>





                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </section>

@endsection