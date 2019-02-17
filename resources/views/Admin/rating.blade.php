@extends('layouts.master')

@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Shops Rating</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Shops Rating</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @foreach($stores as $store)

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fa fa-bar-chart-o"></i>
                                        {{$store->name}}
                                    </h3>


                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <div class="row">
                                        @foreach($store->ShopsInLocation as $instore)
                                        <div class="col-md-2 text-center">
                                            <input type="text" class="knob" value="{{$instore->rating}}" data-width="90" data-height="90" data-fgColor="{{$colours[$i]}}"
                                                   data-readonly="true">

                                            <div class="knob-label">{{$instore->name}}</div>
                                        </div>
                                            <?php $i++; ?>
                                        @endforeach
                                    </div>


                                    <!-- /.row -->
                                </div>
                            <?php $i = 0; ?>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                @endforeach

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection



