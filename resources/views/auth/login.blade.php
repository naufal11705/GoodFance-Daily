@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <img class="img-responsive"src="{{ ('img/hello.svg') }}" style="width: auto; height: auto; margin-top: -100px">
        </div>
        <div class="col-md-4" style="margin-top: 40px;">
            <div style="margin-bottom: 50px;">
                <h2 style="font-weight: 900;">Welcome Back!</h2>
                <h5 style="font-size: 11pt;">Silahkan login dibawah ya!</h5>
            </div>
            <div class="card">
                <div class="card-header" style="text-align: center; background-color: #24FF00; font-weight: 700; font-size: 16pt; color: white;">{{ __('Login') }}</div>

                <div class="card-body">
                    @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning">{{ $error }}</div>
                    @endforeach
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-warning">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn mb-4" style="background-color: #24FF00; color: white;">Login</button>
                            <p>Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection