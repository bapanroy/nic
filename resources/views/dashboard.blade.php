@extends("layouts.layout")
@section("title","Dashboard page")
@section("content")
<h2>Hi "{{ auth()->user()->name }}", Welcome to the Dashboard</h2>
<p>This is the body </p>

@endsection