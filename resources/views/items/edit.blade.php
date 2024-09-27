@extends('layouts.layout')

@section('title', 'Edit Item')

@section('content')
<h2>Edit Item</h2>
<form method="POST" action="{{ route('items.update', $item->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Item Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ $item->name }}" required>
    </div>
    <div class="form-group">
        <label for="item_group_id">Item Group:</label>
        <select id="item_group_id" class="form-control" name="item_group_id" required>
            @foreach ($itemGroups as $itemGroup)
            <option value="{{ $itemGroup->id }}" {{ $itemGroup->id == $item->item_group_id ? 'selected' : '' }}>
                {{ $itemGroup->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" id="price" class="form-control mb-3" name="price" value="{{ $item->price }}" step="0.01">
    </div>
    <button type="submit" class="btn btn-primary">Update Item</button>
</form>
@endsection