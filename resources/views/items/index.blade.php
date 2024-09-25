@extends('layouts.layout')

@section('title', 'Items List')

@section('content')
<h2>Items</h2>
<a href="{{ route('items.create') }}">Create New Item</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Item Group</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->itemGroup->name }}</td>
            <td>${{ $item->price }}</td>
            <td>
                <a href="{{ route('items.show', $item->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
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