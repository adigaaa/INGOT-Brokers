@extends('layout.main')

@section('body')
    <p class="h3">Total Income {{ $data->totalIncome }} </p><br>
    <p class="h3">Total Expense {{ $data->totalExpense }} </p><br>
    <p class="h3">Available on Wallet {{ $data->total }} </p>
    <form class="form-signin" method="post" action="{{ route('add.to.my.wallet') }}">

        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category" id="category">
                <option selected>-</option>

                @foreach($data->categories as $category)
                    @if(old('category') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @endif
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        @error('category')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <div class="form-label-group">
            <input type="text" id="amount" name="amount" class="form-control" placeholder="Amount" required autofocus value="{{ old('amount') }}">
            <label for="amount">Amount</label>
        </div>
        @error('amount')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>

    </form>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Category</th>
            <th scope="col">Type</th>
            <th scope="col">Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data->myWallet as $element)
        <tr>
            <th scope="row">{{ $element->id }}</th>
            <td>{{ $element->category->name }}</td>
            <td>{{ $element->category->typeName }}</td>
            <td> {{ $element->amount }}</td>
        </tr>

        @endforeach
        </tbody>
    </table>


@endsection


