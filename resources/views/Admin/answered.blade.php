@extends('layouts.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 >Answered Questionnaires</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Answered Questionnaires</li>
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
                            <th >Store</th>
                            <th>Location</th>
                            <th>Question</th>
                            <th>Answer</th>

                            </thead>
                            <tbody>
                                @foreach($answers as $answer)
                                    <tr>
                                        <td>{{$answer->Questions->ShopsInLocation->LocationShop->stores->name}}</td>
                                        <td>{{$answer->Questions->ShopsInLocation->LocationShop->name}} - {{$answer->Questions->ShopsInLocation->name}}</td>
                                        <td>{{$answer->Questions->questionnaire}}</td>
                                        <td>{{$answer->answer}}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$answers->links()}}
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection



