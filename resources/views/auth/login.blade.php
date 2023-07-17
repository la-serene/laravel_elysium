@extends('auth.layout')
@section('content')
    <form action="">
        <h3>LOGIN</h3>
        <div class="form-wrapper">
            <input type="text" placeholder="Email Address" class="form-control">
            <i class="zmdi zmdi-email"></i>
        </div>

        <div class="form-wrapper">
            <input type="password" placeholder="Password" class="form-control">
            <i class="zmdi zmdi-lock"></i>
        </div>
        <a href="forget.html" class="forget-password">
            Forget password?
            <i class="zmdi zmdi-arrow-right"></i>
        </a>

        <button>Login
            <i class="zmdi zmdi-arrow-right"></i>
        </button>
        <a href="register.html" style="color: gray; padding-top: 20px ; padding-left: 5px;">
            You don't have an account? Register now!
        </a>
    </form>
@endsection
