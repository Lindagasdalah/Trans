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
                        <h3 class="box-title">Modifier route</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('routes.update', $route->id) }}">

                        {{ csrf_field() }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="route_name">nom de la route</label>
                                <input value="{{ $route->route_name }}" type="text" class="form-control" name="route_Sname" id="route_Sname" placeholder="Short name">
                            </div>
                            <div class="form-group">
                                <label for="coloor">Color</label>
                                <input  value="{{ $route->route_color }}" type="text" class="form-control" name="route_color" id="route_color" placeholder="Color">
                            </div>

                            <div class="form-group">
                                <label for="coord">coordonné</label>
                                <input  value="{{ $route->coordonne }}" type="text" class="form-control" name="coord" id="route_txtColor" placeholder="Text Color">
                            </div>
                            <div class="form-group">
                                <label>Ligne</label>
                                <select class="form-control select2" style="width: 100%;" name="ligne_id" id="ligne_id">
                                    @foreach(App\Ligne::all() as $ligne)
                                        <option value="{{$ligne->id}}">{{$ligne->ligne_name}}</option>
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