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
                        <h3 class="box-title">Modifier ligne</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('lignes.update', $ligne->id) }}">

                        {{ csrf_field() }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="route_Sname">Short name</label>
                                <input type="text" class="form-control" name="ligne_name" id="ligne_name" value="{{$ligne->ligne_name}}">
                            </div>
                            <div class="form-group">
                                <label>transport</label>
                                <select class="form-control select2" style="width: 100%;" name="transport_id" id="transport_id">
                                    @foreach(App\Transport_type::all() as $type)
                                        <option value="{{$type->id}}">{{$type->transport_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Agence</label>
                                <select class="form-control select2" style="width: 100%;" name="agence_id" id="agence_id">
                                    @foreach(App\Agence::all() as $agence)
                                        <option value="{{$agence->id}}">{{$agence->agence_name}}</option>
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