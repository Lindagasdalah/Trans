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
                        <h3 class="box-title">Modifier jour fériés</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('feries.update', $ferie->id) }}">

                        {{ csrf_field() }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="feries_name">jour feriés</label>
                                <input value="{{ $ferie->ferie_name }}" type="text" class="form-control" name="ferie_name" id="ferie_name" placeholder="ferie_name">
                            </div>

                            <div class="form-group">
                                <label for="feries_date">date</label>
                                <input value="{{ $ferie->ferie_date }}" type="date" class="form-control" name="ferie_date" id="ferie_date" placeholder="ferie_date">
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