@extends('layouts.layout')

@section('title', 'Item Group Details')

@section('content')
<h2>Item Group Details</h2>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Name: {{ $itemGroup->name }}</h5>

        <a href="{{ route('item-groups.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection