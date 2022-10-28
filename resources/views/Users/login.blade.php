@extends('layouts.app')

@section('title' , 'User - Login ')


@section('content')

    @if ( $errors->any() )
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form class="row g-3" method="POST" action="{{ route('User.handleLogin') }}">

        @csrf

        <h3>Welcome Back </h3>

        <hr>

        <div class="col-md-12">
            <label class="form-label">User E-mail</label>
            <input type="text" class="form-control"  value="{{ old('email') }}" name="email" >
        </div>

        <div class="mb-3">
            <label class="form-label">User Password</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" >
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>

@endsection
