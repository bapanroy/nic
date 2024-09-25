@extends('layouts.layout')

@section('title', 'Expenditure Details')

@section('content')
<div class="card">
    <div class="card-body">
        <h2>Expenditure Details</h2>
        <p><strong>ID:</strong> {{ $expenditure->id }}</p>
        <p><strong>Item:</strong> {{ $expenditure->item->name }}</p>
        <p><strong>Amount:</strong> {{ $expenditure->amount }}</p>
        <p><strong>Date:</strong> {{ $expenditure->date->format('Y-m-d') }}</p>

        <a href="{{ route('expenditures.index') }}" class="btn btn-secondary">Back to Expenditures</a>
    </div>
</div>
@endsection