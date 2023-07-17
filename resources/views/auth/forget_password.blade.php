@extends('auth.layout')
@section('content')
    <form action="{{ route('password.forget') }}" method="POST">
        @csrf
        <h3>Reset password</h3>
        <h5 style="color: red;">
            Please enter the email address you used for registration.*</h5>
        <div class="form-wrapper">
            <label>
                <input type="text" placeholder="Email Address" class="form-control" name="email">
            </label>
            <i class="zmdi zmdi-email"></i>
        </div>
        <button>
            Send
            <i class="zmdi zmdi-arrow-right"></i>
        </button>
    </form>
@endsection
