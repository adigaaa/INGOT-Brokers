@extends('layout.main')


@section('body')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Birthdate</th>
            <th scope="col">Total Income</th>
            <th scope="col">Total Expense</th>
            <th scope="col">Register Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td> {{ $user->email }}</td>
                <td> {{ $user->name }}</td>
                <td> {{ $user->date_of_birth }}</td>
                <td> {{ $user->getTotalIncome()}}</td>
                <td> {{ $user->getTotalExpense()}}</td>
                <td> {{ $user->created_at }}</td>


            </tr>

        @endforeach
        </tbody>
    </table>


@endsection

