@extends('template')

@section('head')
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .login-container {
            max-width: 360px;
            width: 100%;
            padding: 35px 20px;
            border: 1px solid #cdcdcd;
            border-radius: 5px;
            background-color: #fff;
        }
    </style>
@endsection

@section('body')
    <div class="login-container">
        <h1 class="text-center mb-4">Login</h1>

        @foreach ($errors->all() as $error)
            <p class="text-danger text-center">{{ $error }}</p>
        @endforeach

        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary ms-auto d-block">Login</button>
        </form>
    </div>
@endsection
