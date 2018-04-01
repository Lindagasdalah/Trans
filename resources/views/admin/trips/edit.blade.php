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
                        <h3 class="box-title">Modifier trips</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('trips.update', $trip->id) }}">

                        {{ csrf_field() }}

                        <div class="box-body">

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="trip_name" >trip name</label>
                                    <input value="{{ $trip->trip_name }}" type="text" class="form-control" name="trip_name" id="trip_name" placeholder="trip_name">
                                </div>
                                <div class="form-group">
                                    <label for="sens">Sens</label>
                                    <input value="{{ $trip->sens }}" type="text" class="form-control" name="sens" id="sens" placeholder="sens">
                                </div>

                                <div class="form-group">
                                    <label>Circule </label>
                                    <select class="form-control select2" style="width: 30%;" name="service_id" id="service_id">
                                        @foreach(App\Calender::all() as $calender)
                                            <option value="{{$calender->id}}">{{$calender->service_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="route_id">Route</label>
                                    <select class="form-control select2" style="width: 15%;" name="route_id" id="route_id">
                                        @foreach(App\Route::all() as $route)
                                            <option value="{{$route->id}}">{{$route->route_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Confirmer</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
        </div>
    </section>



@endsection