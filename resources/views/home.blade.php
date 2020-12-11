@extends('layout.main')


@section('body')
    <a href="{{ route('add.category') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add Category</a>
    <a href="{{ route('my.wallet') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">My Wallet</a>
    <a href="{{ route('admin') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Admin</a>
    <a href="{{ route('user.logout') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Logout</a>
@endsection
