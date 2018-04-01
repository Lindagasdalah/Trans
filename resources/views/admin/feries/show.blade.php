@extends('layouts.main')

@section('content')

    <section class="content">
        <div class="row">

            <!-- left column -->
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Détails jour feries</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-pencil margin-r-5"></i>jour feriés</strong>

                        <p class="text-muted">
                            {{ $ferie->ferie_name}}
                        </p>

                        <hr>


                        <strong><i class="fa fa-map-marker margin-r-5"></i> date</strong>

                        <p class="text-muted">
                            {{ $ferie->ferie_date }}
                        </p>

                        <hr>





                    </div>
                    <!-- /.box-body -->

            </div>
        </div>
    </section>

@endsection