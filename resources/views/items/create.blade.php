@extends('layouts.layout')

@section('title', 'Create Item')

@section('content')
<h2>Create New Item</h2>
<div class="card-body">
    <form method="POST" action="{{ route('items.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Item Name:</label>
            <input type="text" id="name" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="item_group_id">Item Group:</label>
            <select id="item_group_id" class="form-control" name="item_group_id" required>
                @foreach ($itemGroups as $itemGroup)
                <option value="{{ $itemGroup->id }}">{{ $itemGroup->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" class="form-control" name="price" step="0.01">
        </div>
        <div class="mt-4 mb-0">
            <button type="submit" class="btn btn-secondary">Create Item</button>
        </div>
    </form>
</div>
@endsection