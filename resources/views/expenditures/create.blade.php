@extends('layouts.layout')

@section('title', 'Add Expenditure')

@section('content')
<h2>Add Expenditure</h2>
<form method="POST" action="{{ route('expenditures.store') }}">
    @csrf
    <div class="form-group">
        <label for="item_id">Item:</label>
        <select id="item_id" name="item_id" class="form-control">
            @foreach($items as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @error('item_id')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" class="form-control" required>
        @error('amount')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" class="form-control" required>
        @error('date')
        <div class="error">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save Expenditure</button>
</form>
@endsection