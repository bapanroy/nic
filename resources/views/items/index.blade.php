@extends('layouts.layout')

@section('title', 'Items List')

@section('content')
<h2>Items</h2>
<div class="col-sm-6"><a href="{{ route('items.create') }}" class="btn btn-primary">Create New Item</a></div>

<table class="table table-striped" id="datatablesSimple">
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