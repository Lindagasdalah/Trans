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
                        <h3 class="box-title">Modifier Station</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('stops.update', $stop->id) }}">

                        {{ csrf_field() }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="stop_name">stop name</label>
                                <input value="{{ $stop->stop_name }}" type="text" class="form-control" name="stop_name" id="stop_name" placeholder="stop_name">
                            </div>

                            <div class="form-group">
                                <label for="stop_lat">stop_lat</label>
                                <input value="{{ $stop->stop_lat }}" type="text" class="form-control" name="stop_lat" id="stop_lat" placeholder="stop_lat">
                            </div>

                            <div class="form-group">
                                <label for="stop_lon">stop_lon</label>
                                <input value="{{ $stop->stop_lon }}" type="text" class="form-control" name="stop_lon" id="stop_lon" placeholder="stop_lon">
                            </div>
                            <div class="form-group">
                                <label>transport</label>
                                <select class="form-control select2" style="width: 100%;" name="agence_id" id="agence_id">
                                    @foreach(App\Transport_type::all() as $transport_type)
                                        <option value="{{$transport_type->id}}">{{$transport_type->transport_name}}</option>
                                    @endforeach
                                </select>
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