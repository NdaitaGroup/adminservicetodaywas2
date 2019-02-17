@extends('layouts.master')

@section('content')




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Comments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Comments</li>
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

                        <table class="table table-hover table-bordered table-stripped">
                                <thead>
                                    <th>OTP</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Store - Location</th>
                                    <th>Comments</th>
                                </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->otp}}</td>
                                        <td>{{$comment->comment_date}}</td>
                                        @if($comment->status == 'complete')
                                            <td class="bg-success">{{$comment->status}}</td>
                                        @else
                                            <td class="bg-warning">{{$comment->status}}</td>
                                        @endif
                                        <td>
                                            {{$comment->ShopsInLocation->LocationShop->stores->name}} -
                                            {{$comment->ShopsInLocation->LocationShop->name}}
                                            ({{$comment->ShopsInLocation->name}})
                                        </td>
                                        <td>{{$comment->comments}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                            {{$comments->links()}}

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection



