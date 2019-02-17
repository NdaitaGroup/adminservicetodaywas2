@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Store Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Store Users</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="card shadow">
                                    <div class="card-header">
                                        Add Admin or Manager User
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('store')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="store">Store</label>
                                                <select name="store" id="store" class="form-control{{ $errors->has('store') ? ' is-invalid' : '' }}" value="{{ old('store') }}" >
                                                    <option value="">Select</option>
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
                                                <label for="location">Location</label>
                                                <select name="location" id="" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}">
                                                    <option value="">Select</option>
                                                    @foreach($locations as $location)
                                                        <option value="{{$location->id}}">{{$location->name}}</option>
                                                    @endforeach

                                                </select>

                                                @if ($errors->has('location'))
                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('location') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="place">Place</label>
                                                <select name="place" id="place" class="form-control{{ $errors->has('place') ? ' is-invalid' : '' }}">
                                                    <option value="">Select</option>
                                                    @foreach($places as $place)
                                                        <option value="{{$place->id}}">{{$place->name}}</option>
                                                    @endforeach

                                                </select>

                                                @if ($errors->has('place'))
                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('place') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="user_type">User Type</label>
                                                <select name="user_type" id="user_type" class="form-control{{ $errors->has('user_type') ? ' is-invalid' : '' }}">
                                                    <option value="">Select</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Manager">Manager</option>
                                                </select>

                                                @if ($errors->has('user_type'))
                                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('user_type') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Password</label>
                                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}">
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" >
                                                @if ($errors->has('	password_confirmation'))
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-info" type="submit">
                                                    <i class="fa fa-plus"></i> Add
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection



