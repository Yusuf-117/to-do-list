@extends('template')
@section('head')
    <style>
        body{background-color:#e6e6e6; }
    </style>
@endsection

@section('body')
<div class="container">
    <img src="{{ asset('images/logo.png') }}" alt="logo" class="mt-3">

    <div class="row mt-5">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Insert task name">
                <button class="btn btn-primary w-100 mt-3">Add</button>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <table class="table border-bottom border-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Task</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Num</td>
                                <td>Task Name</td>
                            </tr>
                            <tr>
                                <td>Num</td>
                                <td>Task Name</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer fixed-bottom text-center mb-5">Copyright @ 2020 All Rights Reserved.</footer>
@endsection
