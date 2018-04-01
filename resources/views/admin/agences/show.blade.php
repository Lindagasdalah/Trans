@extends('layouts.main')

@section('content')

    <section class="content">
        <div class="row">

            <!-- left column -->
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Détails agence</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-pencil margin-r-5"></i>agence name</strong>

                        <p class="text-muted">
                            {{ $agence->agence_name}}
                        </p>


                        <strong><i class="fa fa-map-marker margin-r-5"></i> agence adresse</strong>

                        <p class="text-muted">
                            {{ $agence->agence_adresse }}
                        </p>

                        <hr>





                    </div>
                    <!-- /.box-body -->

            </div>
        </div>
    </section>

@endsection