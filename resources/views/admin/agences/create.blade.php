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
                        <h3 class="box-title">Nouvelle agence</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('agences.store') }}">

                        {{ csrf_field() }}

                        <div class="box-body">

                            <div class="form-group">
                                <label for="agence_name">Nom de l'agence : </label>
                                <input type="text" class="form-control" name="agence_name" id="agence_name" placeholder="Nom">
                            </div>
                            <div class="form-group">
                                <label for="agence_adresse">Adresse : </label>
                                <input type="text" class="form-control" name="agence_adresse" id="agence_adresse" placeholder="Adresse">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i>    Confirmer</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
        </div>
    </section>



@endsection