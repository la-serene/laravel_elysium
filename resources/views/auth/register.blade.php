
@extends('auth.layout')
@section('content')
    <form action="{{ route('store') }}" method="POST">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <h3>Registration Form</h3>
        <div class="form-group">
            <label>
                <input type="text" placeholder="First Name" class="form-control" name="first_name">
            </label>
            <label>
                <input type="text" placeholder="Last Name" class="form-control" name="last_name">
            </label>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="text" placeholder="Username" class="form-control" name="username">
            </label>
            <i class="zmdi zmdi-account"></i>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="tel" placeholder="Phone number" class="form-control" name="phone_number">
            </label>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="text" placeholder="Address" class="form-control" name="address">
            </label>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="text" placeholder="Email Address" class="form-control" name="email">
            </label>
            <i class="zmdi zmdi-email"></i>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="date" placeholder="Date Of Birth" class="form-control" name="date_of_birth">
            </label>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="password" placeholder="Password" class="form-control" name="password">
            </label>
            <i class="zmdi zmdi-lock"></i>
        </div>
        <div class="form-wrapper">
            <label>
                <input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation">
            </label>
            <i class="zmdi zmdi-lock"></i>
        </div>
        <button>
            Register
            <i class="zmdi zmdi-arrow-right"></i>
        </button>
    </form>
@endsection


