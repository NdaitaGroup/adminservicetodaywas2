@extends('layouts.master')

@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Places</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Places</li>
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
                        <form action="{{route('save.place')}}" method="post">
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
                                <label for="location">Location Name</label>
                                <select name="location" id="location" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" >
                                    <option value="">Select Location</option>
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
                                <label for="name">Place Name</label>
                                <input type="text" name="name" id="store" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Add Place" class="btn btn-primary">
                            </div>

                        </form>
                        <table class="table table-hover table-bordered table-stripped">
                            <thead>
                                <th>Store</th>
                                <th>Location</th>
                                <th>Place</th>
                                <th>Rating</th>
                            </thead>
                            <tbody>
                            @foreach($places as $place)
                                <tr>
                                    <td>{{$place->LocationShop->stores->name}}</td>
                                    <td>{{$place->LocationShop->name}}</td>
                                    <td>{{$place->name}}</td>
                                    <td>{{$place->rating}}</td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer">
                        {{$places->links()}}
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection



