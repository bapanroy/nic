@extends('layouts.layout')

@section('title', 'Edit Item Group')

@section('content')
<h2>Edit Item Group</h2>

<form action="{{ route('item-groups.update', $itemGroup->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Item Group Name:</label>
        <input type="text" id="name" name="name" class="form-control mb-3" value="{{ old('name', $itemGroup->name) }}"
            required>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('item-groups.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection