@extends('layouts.layout')

@section('title', 'Item Details')

@section('content')
<div class="card">
    <div class="card-body">
        <h2>Item Details</h2>
        <p><strong>Name:</strong> {{ $item->name }}</p>
        <p><strong>Item Group:</strong> {{ $item->itemGroup->name }}</p>
        <p><strong>Price:</strong> ${{ $item->price }}</p>

        <a href="{{ route('items.index') }}" class="btn btn-primary">Back to Items List</a>
    </div>
</div>
@endsection