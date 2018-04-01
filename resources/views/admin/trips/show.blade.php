@extends('layouts.main')
@section('content')

    <section class="content">
        <div class="row">

            <!-- left column -->
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Détails Trips</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-pencil margin-r-5"></i>Nom Trip</strong>

                        <p class="text-muted">
                            {{ $trip->trip_name}}
                        </p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i>Sens</strong>

                        <p class="text-muted">
                            {{ $trip->sens}}
                        </p>

                        <hr>

                        <strong><i class="fa fa-train margin-r-5"></i>Circule</strong>

                        <p class="text-muted">
                            {{ $trip->service_id}}
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i>Route</strong>

                        <p class="text-muted">
                            {{ $trip->route_id}}
                        </p>

                    </div>
                    <!-- /.box-body -->

                </div>
            </div>
        </div>
    </section>

@endsection