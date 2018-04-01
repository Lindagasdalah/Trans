@extends('layouts.main')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Horaires</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <form role="form" method="POST" action="{{ route('stops_time.store') }}">

                {{ csrf_field() }}

                <div class="box-body">
                    <div class="form-group">
                        <label for="arrived_time">temps d'arriver </label>
                        <input style="width: 10%" type="time" class="form-control" name="arrived_time" id="arrived_time" placeholder="arrived_time">
                    </div>

                    <div class="form-group">
                        <label for="departure_time">temps de départ </label>
                        <input style="width: 10%" type="time" class="form-control" name="departure_time" id="departure_time" placeholder="departure_time">
                    </div>

                    <div class="form-group">
                        <label for="trip_id">trip</label>
                        <select class="form-control select2" style="width: 15%;" name="trip_id" id="trip_id">
                            @foreach(App\Trip::all() as $trip)
                                <option value="{{$trip->id}}">{{$trip->trip_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stoproute_id">RouteStop</label>
                        <select class="form-control select2" style="width: 15%;" name="stoproute_id" id="stoproute_id">
                            @foreach(App\RouteStops::all() as $routeStop)
                                <option value="{{$routeStop->id}}">{{$routeStop->stop->stop_name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Confirmer</button>
                </div>

                <!-- /.box-body -->
            </form>

        </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        var lignes_url="{{route('getLignesByTransport')}}";
        function recupe(value) {
            $.post(lignes_url, {_token: "{{csrf_token()}}", transport_id: value}, function (res) {
                $('#ligne_id').prop('disabled',false);
                $('#ligne_id').html(res.html);
            });
        };

        var routes_url="{{route('getRoutesByLigne')}}";
        function recupe2(value) {
            $.post(routes_url,{_token:"{{csrf_token()}}",ligne_id:value}, function (res) {
                $('#route_id').prop('disabled',false);
                $('#route_id').html(res.html);

            });

        };
    </script>


@endsection
