@extends('template')
@section('head')
    <style>
        body {
            background-color: #e6e6e6;
        }
    </style>
@endsection

@section('body')
    <div class="container">
        <img src="{{ asset('images/logo.png') }}" alt="logo" class="mt-3">

        <div class="row mt-5">
            <div class="col-md-4">
                <form action="/tasks" method="POST">
                    @csrf
                    <input type="text" class="form-control" placeholder="Insert task name" name="name">
                    <button class="btn btn-primary w-100 mt-3">Add</button>
                    @if (session('success'))
                        <p class="text-success text-center mt-2">{{ session('success') }}</p>
                    @endif
                    @foreach ($errors->all() as $error)
                        <p class="text-danger text-center mt-2">{{ $error }}</p>
                    @endforeach
                </form>
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
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{$task->id}}</td>
                                    <td>{{$task->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer fixed-bottom text-center mb-5">Copyright @ 2020 All Rights Reserved.</footer>
@endsection
