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
                        <h3 class="box-title">Modifier agence</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('types.update', $agence->id) }}">

                        {{ csrf_field() }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="agence_name">agence name</label>
                                <input value="{{ $agence->transport_name }}" type="text" class="form-control" name="transport_name" id="transport_name" placeholder="name">
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