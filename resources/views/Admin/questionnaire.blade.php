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

                        <form action="#">
                            @csrf
                            <div class="form-group">
                                <label for="questionnaire">Questionnaire</label>
                                <input type="text" name="questionnaire" id="questionnaire" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Save Questionnaire" class="btn btn-primary">
                            </div>

                        </form>


                        <table class="table table-hover table-bordered table-stripped">
                            <thead>
                                <th>ID</th>
                                <th>Questionnaire</th>
                                <th>Status</th>
                                <th>action</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>11</td>
                                <td>kkjkjk</td>
                                <td>kkjkjk</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection



