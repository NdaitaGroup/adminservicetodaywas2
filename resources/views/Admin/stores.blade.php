@extends('layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Stores</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Stores</li>
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
                        <form action="{{route('add.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Store Name</label>
                                <input type="text" name="name" id="questionnaire" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Add Store" class="btn btn-primary">
                            </div>

                        </form>

                        <table  class="table table-hover table-bordered table-stripped">
                            <thead>
                                <th>ID</th>
                                <th>Store Name</th>
                            </thead>
                            <tbody>
                                @foreach($stores as $store)
                                    <tr>
                                        <td>{{$store->id}}</td>
                                        <td>{{$store->name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$stores->links()}}


                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection



