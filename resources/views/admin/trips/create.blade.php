@extends('layouts.main')
@section('content')
    <section class="content">
        <div class="row">
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

                <div class="box">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nouveau Trips</h3>
                        </div>
                        <!-- /.box-header -->
                        <!--/.box-body -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>transport</label>
                                <select class="form-control select2" style="width: 10%;" name="transport_id" id="transport_id" onchange="recupe(this.value)">
                                    @foreach(App\Transport_type::all() as $type)
                                        <option value="{{$type->id}}">{{$type->transport_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Ligne</label>
                                <select disabled class="form-control select2" style="width: 10%;" name="ligne_id" id="ligne_id" onchange="recupe2(this.value)">

                                </select>
                            </div>
                            <!-- form start -->
                            <form role="form" method="POST" action="{{ route('trips.store') }}">

                                {{ csrf_field() }}

                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="trip_name">Nom Trip </label>
                                        <input type="text" class="form-control" name="trip_name" id="trip_name" placeholder="trip_name">
                                    </div>

                                    <div class="form-group">
                                        <label for="sens">Sens</label>
                                        <select class="form-control select2" style="width: 100%;" name="sens" id="sens">
                                            <option>Choisissez le sens</option>
                                            <option value="0"> Direct</option>
                                            <option value="1">Inverse</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Circule </label>
                                        <select class="form-control select2" style="width: 100%;" name="service_id" id="service_id">
                                            @foreach(App\Calender::all() as $calender)
                                                <option value="{{$calender->id}}">{{$calender->service_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Route</label>
                                        <select disabled class="form-control select2" style="width: 10%;" name="route_id" id="route_id">

                                        </select>
                                    </div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Confirmer</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>


    </section>


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