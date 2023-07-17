@extends('auth.layout')
@section('content')
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <h3>Registration Form</h3>
        <div class="form-group">
            <label>
                <input type="text" placeholder="First Name" class="form-control">
            </label>
            <label>
                <input type="text" placeholder="Last Name" class="form-control">
            </label>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="text" placeholder="Username" class="form-control">
            </label>
            <i class="zmdi zmdi-account"></i>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="tel" placeholder="Phone number" class="form-control">
            </label>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="text" placeholder="Address" class="form-control">
            </label>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="text" placeholder="Email Address" class="form-control">
            </label>
            <i class="zmdi zmdi-email"></i>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="date" placeholder="Date Of Birth" class="form-control">
            </label>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="password" placeholder="Password" class="form-control">
            </label>
            <i class="zmdi zmdi-lock"></i>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="password" placeholder="Confirm Password" class="form-control">
            </label>
            <i class="zmdi zmdi-lock"></i>
        </div>
        <button>Register
            <i class="zmdi zmdi-arrow-right"></i>
        </button>
    </form>
@endsection
