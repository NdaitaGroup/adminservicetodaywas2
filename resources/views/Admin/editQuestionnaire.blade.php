@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Questionnaire Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Questionnaire Management</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-body">

                        <form action="{{route('update.questionnaire',$questionnaire->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="questionnaire">Questionnaire</label>
                                <input type="text" name="questionnaire" id="questionnaire" class="form-control{{ $errors->has('questionnaire') ? ' is-invalid' : '' }}" value="{{$questionnaire->questionnaire}}">
                                @if ($errors->has('questionnaire'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('questionnaire') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Update Questionnaire" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection



