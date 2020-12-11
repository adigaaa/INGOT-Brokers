@extends('layout.main')


@section('body')
    <form class="form-signin" method="post" action="{{ route('user.login') }}">
        <div class="form-label-group">
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus value="{{ old('email') }}">
            <label for="inputEmail">Email address</label>
        </div>
        @error('email')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
            <label for="inputPassword">Password</label>
        </div>



        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        @csrf
        <p>dont have accout ? </p> <a href="{{ route('user-registeration-page') }}"> Sign up</a>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
@endsection
