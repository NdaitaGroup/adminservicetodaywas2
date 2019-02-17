@extends('layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Locations</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Locations</li>
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
                        <form action="{{route('save.location')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="store">Store Name</label>

                                <select name="store" id="store" class="form-control{{ $errors->has('store') ? ' is-invalid' : '' }}">
                                    <option value="">Select Store</option>
                                    @foreach($stores as $store)
                                        <option value="{{$store->id}}">{{$store->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('store'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('store') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Location Name</label>
                                <input type="text" name="name" id="store" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Add Location" class="btn btn-primary">
                            </div>

                        </form>
                        <table class="table table-hover table-bordered table-stripped">
                            <thead>
                            <th>Store</th>
                            <th>Location</th>
                            <th>Actions</th>

                            </thead>
                            <tbody>
                            @foreach($locations as $location)
                                <tr>
                                    <td>{{$location->stores->name}}</td>
                                    <td>{{$location->name}}</td>
                                    <td><a href="#" class="btn btn-sm btn-info"><i class="fa fa-edit"></i>   </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$locations->links()}}
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection



