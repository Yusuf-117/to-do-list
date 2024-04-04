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
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary d-block ms-auto">Logout</button>
        </form>

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
                                    <td>{{ $task->id }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col"> {!! $task->completed ? "<strike>$task->name</strike>" : $task->name !!} </div>
                                            @if (!$task->completed)
                                                <div class="col-auto">
                                                    <div class="d-flex justify-content-end">
                                                        <form action="/tasks/{{ $task->id }}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <button type="submit" class="btn btn-success me-2">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                        </form>
                                                        <form action="/tasks/{{ $task->id }}" method="POST">
                                                            @method('DELETE')

                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer text-center mb-5 mt-5">Copyright @ 2020 All Rights Reserved.</footer>
@endsection
