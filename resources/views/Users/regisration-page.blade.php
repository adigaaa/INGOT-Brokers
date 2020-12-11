@extends('layout.main')


@section('body')
    <form class="form-signin" method="post" enctype="multipart/form-data" action="{{ route('user.register') }}">

        <div class="form-label-group">
            <input type="text" id="inputName" name="name" class="form-control" placeholder="Enter your name" required autofocus value="{{ old('name') }}">
            <label for="inputName">Your name</label>
        </div>
        @error('name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror


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
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required autofocus>
            <label for="inputPassword">Password</label>
        </div>
        @error('password')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <div class="form-label-group">
            <input type="password" id="inputPasswordconfirmation" name="password_confirmation" class="form-control" placeholder="confirm your password Password" required>
            <label for="inputPasswordconfirmation">Password confirmation</label>
        </div>


        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01"
                       aria-describedby="inputGroupFileAddon01" name="image">
                <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
            </div>
        </div>
        @error('image')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        <div class="md-form md-outline input-with-post-icon datepicker">
            <input placeholder="Select date" type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
            <label for="date_of_birth">Date of birth</label>
        </div>

        @error('date_of_birth')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror



        <div class="form-label-group">
            <input type="text" id="inputcountry_code" name="country_code" class="form-control" placeholder="country code" required value="{{ old('country_code') }}">
            <label for="inputcountry_code">country code</label>
        </div>
        @error('country_code')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <div class="form-label-group">
            <input type="text" id="phone_code" name="phone_code" class="form-control" placeholder="phone code" required value="{{ old('phone_code') }}">
            <label for="phone_code">phone code</label>
        </div>
        @error('phone_code')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror


        @csrf

        <div class="file-field">
            <br>
        <p>dont have accout ? </p> <a href="{{ route('home') }}"> Or login</a>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
    </form>
@endsection
