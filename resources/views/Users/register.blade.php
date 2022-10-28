@extends('layouts.app')

@section('title' , 'User - Registration ')


@section('content')

    @if ( $errors->any() )
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form class="row g-3" method="POST" action="{{ route('User.handleRegister') }}">

        @csrf

        <h3>Register Now</h3>

        <hr>

        <div class="col-md-12">
            <label class="form-label">User Name</label>
            <input type="text" class="form-control" value="{{ old('name') }}" name="name" >
        </div>

        <div class="col-md-12">
            <label class="form-label">User Address</label>
            <input type="text" class="form-control" value="{{ old('address') }}" name="address" >
        </div>

        <div class="col-md-12">
            <label class="form-label">User E-mail</label>
            <input type="text" class="form-control"  value="{{ old('email') }}" name="email" >
        </div>

        <div class="mb-3">
            <label class="form-label">User Password</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" >
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-outline-success">Clear</button>
        </div>
    </form>

@endsection
