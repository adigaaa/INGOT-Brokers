@extends('layout.main')


@section('body')
    <form class="form-signin" method="post" action="{{ route('category.create') }}">
        <div class="form-label-group">
            <input type="text" id="Category" name="name" class="form-control" placeholder="Category Name" required autofocus value="{{ old('name') }}">
            <label for="Category">Category name</label>
        </div>
        @error('name')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="exampleFormControlSelect1" name="type">
                <option selected>-</option>
                @foreach($transactionsTypes as $value => $name)
                    <option value="{{ $value }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        @error('name')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror

        @csrf

        <button class="btn btn-lg btn-primary btn-block" type="submit">Create Category</button>

    </form>
@endsection

