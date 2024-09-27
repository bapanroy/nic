@extends("layouts.app")
@section("title","Register page")
@section("content")

<div class="card-header">
    <h3 class="text-center font-weight-light my-4">Register</h3>
</div>
<div class="card-body">
    <form class="form" action="{{ route('register') }}" method="post">

        @csrf
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Name">
            @error("name")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control mb-3" placeholder="Email">

            @error("email")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            <select name="role" id="role" class="form-control mb-3">
                <option value="">Select</option>
                <option value="Admin">Admin</option>
                <option value="Employee">Employee</option>
            </select>
            @error("role")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Password">
            @error("password")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
        <div class="form-group">
            <p>Already have an account? <a href="{{ route('login') }}" class="btn btn-primary">Login</a></p>
        </div>
    </form>
</div>


@endsection