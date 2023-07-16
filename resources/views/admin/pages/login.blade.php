<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Admin Login</title>
  <style>
    .login-form {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="login-form">
      <h2>Admin Login</h2>
      <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">{{ __('Email') }}:</label>
            <x-text-input id="email" class="form-control" type="email" name="email" required />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">{{ __('Password') }}:</label>
            <x-text-input id="password" class="form-control" type="password" name="password" required />
        </div>

        <!-- Remember Me -->
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
        </div>

        <!-- Buttons -->
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
            <a href="{{ route('admin.register') }}" class="btn btn-link">{{ __('Register') }}</a>
            <a href="{{ route('admin.password.request') }}" class="btn btn-link">{{ __('Forgot Password') }}</a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
