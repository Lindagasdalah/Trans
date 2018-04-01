@extends('layouts.main')

@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">ajouter un jour fériés</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('feries.store') }}">

                        {{ csrf_field() }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="Jour">Jour fériés</label>
                                <input type="text" class="form-control" name="ferie_name" id="ferie_name" placeholder="Jour">
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="ferie_date" id="ferie_date" placeholder="date">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Confirmer</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
        </div>
    </section>



@endsection