@extends('auth.layout')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('authenticate') }}" method="POST">
        @csrf
        <h3>LOGIN</h3>
        <div class="form-wrapper">
            <label>
                <input type="text" placeholder="Email Address" class="form-control" name="email">
            </label>
            <i class="zmdi zmdi-email"></i>
        </div>

        <div class="form-wrapper">
            <label>
                <input type="password" placeholder="Password" class="form-control" name="password">
            </label>
            <i class="zmdi zmdi-lock"></i>
        </div>
        <a href="forget.html" class="forget-password">
            Forget password?
            <i class="zmdi zmdi-arrow-right"></i>
        </a>

        <button>Login
            <i class="zmdi zmdi-arrow-right"></i>
        </button>
        <a href="{{ route('register') }}" style="color: gray; padding-top: 20px ; padding-left: 5px;">
            You don't have an account? Register now!
        </a>
    </form>
@endsection
