@extends("layouts.app")
@section("title","Login page")
@section("content")

<div class="card-header">
    <h3 class="text-center font-weight-light my-4">Login</h3>
</div>
<div class="card-body">
    <form class="form" action="{{ route('login') }}" method="post">

        @csrf
        <div class="form-group">
            <input type="email" name="email" class="form-control mb-3" id="email" placeholder="Email">
            @error("email")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control mb-3" id="password" placeholder="Password">
            @error("password")
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <div class="form-group">
            <p>Don't have an account? <a href="{{ route('register') }}" class="btn btn-primary">Register</a></p>
        </div>
    </form>
</div>


@endsection