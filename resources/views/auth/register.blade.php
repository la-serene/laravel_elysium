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
<form action="{{ route('register') }}" method="POST">
    username
    <br>
    <input type="text" name="username">
    <br>
    first name
    <input type="text" name="first_name">
    <br>
    <br>
    last name
    <input type="text" name="last_name">
    <br>
    <br>
    tel
    <input type="text" name="phone_number">
    <br>
    <br>
    address
    <input type="text" name="address">
    <br>
    <br>
    email
    <input type="text" name="email">
    <br>
    date of birth
    <input type="date" name="date_of_birth">
    <br>
    password
    <input type="password" name="password">
    <br>
    password confirmation
    <input type="password" name="password_confirmed">
    <br>
    <button type="submit">Register</button>
</form>
</body>
</html>
