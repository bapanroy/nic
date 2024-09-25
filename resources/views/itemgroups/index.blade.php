@extends('layouts.layout')

@section('title', 'Item Groups')

@section('content')
<h2>Item Groups</h2>
<div class="col-sm-6">
    <a href="{{ route('item-groups.create') }}" class="btn btn-primary">Create New Item Group</a>
</div>
<table class="table table-striped" id="datatablesSimple">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($itemGroups as $itemGroup)
        <tr>
            <td>{{ $itemGroup->id }}</td>
            <td>{{ $itemGroup->name }}</td>
            <td>
                <a href="{{ route('item-groups.show', $itemGroup->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('item-groups.edit', $itemGroup->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('item-groups.destroy', $itemGroup->id) }}" method="POST"
                    style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No Item Groups found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection