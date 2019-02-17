@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Users</li>
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
                           Add Super User
                     </div>
                     <div class="card-body">
                           <form action="{{route('add.Superuser')}}" method="post">
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
                                       <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
                                       @if ($errors->has('email'))
                                             <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                       @endif
                                </div>
                                <div class="form-group">
                                      <label for="name">Password</label>
                                       <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" >
                                       @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                       @endif
                                </div>
                                <div class="form-group">
                                       <label for="name">Confirm Password</label>
                                       <input type="password" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" >
                                       @if ($errors->has('password_confirmation'))
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('password_confirmation') }}</strong>
                                             </span>
                                       @endif
                                </div>
                                <div class="form-group">
                                      <button class="btn btn-info" type="submit" name="addSuper">
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



