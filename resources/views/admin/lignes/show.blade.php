@extends('layouts.main')

@section('content')

    <section class="content">
        <div class="row">

            <!-- left column -->
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Détails ligne</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-pencil margin-r-5"></i>nom de la ligne</strong>

                        <p class="text-muted">
                            {{ $ligne->ligne_name}}
                        </p>

                        <hr>
                        <strong><i class="fa fa-train margin-r-5"></i> Transport</strong>

                        <p class="text-muted">
                            {{ $ligne->transport->transport_name }}
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Agence</strong>

                        <p class="text-muted">
                            {{ $ligne->agence->agence_name }}
                        </p>

                        <hr>



                    </div>
                    <!-- /.box-body -->

            </div>
        </div>
    </section>

@endsection