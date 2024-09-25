@extends('layouts.layout')

@section('title', 'Expenditures')

@section('content')
<h2>Expenditures</h2>
<div class="col-sm-6">
    <a href="{{ route('expenditures.create') }}" class="btn btn-primary">Add New Expenditure</a>
</div>
<table class="table table-striped" id="datatablesSimple">
    <thead>
        <tr>
            <th>ID</th>
            <th>Item</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($expenditures as $expenditure)
        <tr>
            <td>{{ $expenditure->id }}</td>
            <td>{{ $expenditure->item->name }}</td>
            <td>{{ $expenditure->amount }}</td>
            <td>{{ $expenditure->date->format('Y-m-d') }}</td>
            <td>
                <a href="{{ route('expenditures.show', $expenditure->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('expenditures.edit', $expenditure->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('expenditures.destroy', $expenditure->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection