@extends('layouts.main')

@section('content')

    <section class="content">
        <div class="row">

            <!-- left column -->
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Détails Routes</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-pencil margin-r-5"></i>Short Name</strong>

                        <p class="text-muted">
                            {{ $route->route_name}}
                        </p>

                        <hr>



                        <strong><i class="fa fa-map-o margin-r-5"></i> Agence</strong>

                        <p class="text-muted">
                            {{ $route->ligne->ligne_name }}
                        </p>

                        <hr>


                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </section>


@endsection