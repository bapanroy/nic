@extends('layouts.layout')

@section('title', 'Create Item Group')

@section('content')
<h2>Create Item Group</h2>

<form action="{{ route('item-groups.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Item Group Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Create</button>
    <a href="{{ route('item-groups.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection