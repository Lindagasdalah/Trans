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
                        <h3 class="box-title">Nouveau utilisateur</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('users.store') }}">

                        {{ csrf_field() }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>

                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="email">
                            </div>

                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="password">
                            </div>


                        <!-- <div class="form-group">
                                <label>Agence</label>
                                <select class="form-control select2" style="width: 100%;" name="agence_id" id="agence_id">
                                     @foreach(App\Agence::all() as $agence)
                            <option value="{{$agence->id}}">{{$agence->nom}}</option>
                                    @endforeach
                                </select>
                            </div>-->

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