@extends("layouts.layout")
@section("title","Dashboard page")
@section("content")
<div class="card">
    <div class="card-body">

        <h2>Profile</h2>
        <form class="profile-form" method="post" action="{{ route('profile') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name }}">
                @error("name")
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
            </div>
            <div class="form-group">
                <label for="role">role:</label>
                <input type="text" id="role" name="role" class="form-control mb-3" value="{{ auth()->user()->role }}">
                @error("role")
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>

    </div>
</div>
@endsection