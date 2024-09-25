@extends('layouts.layout')

@section('title', 'Edit Expenditure')

@section('content')
<h2>Edit Expenditure</h2>
<form method="POST" action="{{ route('expenditures.update', $expenditure->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="item_id">Item:</label>
        <select id="item_id" name="item_id" class="form-control">
            @foreach($items as $item)
            <option value="{{ $item->id }}" {{ $item->id == $expenditure->item_id ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
            @endforeach
        </select>
        @error('item_id')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" class="form-control" value="{{ $expenditure->amount }}" required>
        @error('amount')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" class="form-control" value="{{ $expenditure->date->format('Y-m-d') }}" required>
        @error('date')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update Expenditure</button>
</form>
@endsection