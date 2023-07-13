<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('store') }}" method="POST">
    @csrf
    username
    <br>
    <input type="text" name="username" value="ky">
    <br>
    first name
    <input type="text" name="first_name" value="ky">
    <br>
    <br>
    last name
    <input type="text" name="last_name" value="ky">
    <br>
    <br>
    tel
    <input type="text" name="phone_number" value="0325454125">
    <br>
    <br>
    address
    <input type="text" name="address" value="dasfghsdfg">
    <br>
    <br>
    email
    <input type="text" name="email" value="caoky2003xx@gmail.com">
    <br>
    date of birth
    <input type="date" name="date_of_birth" value="01-10-2003">
    <br>
    password
    <input type="password" name="password" value="1234">
    <br>
    password confirmation
    <input type="password" name="password_confirmation" value="1234">
    <br>
    <button type="submit">Register</button>
</form>
</body>
</html>
