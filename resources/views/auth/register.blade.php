<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form method="POST" action="/register">
        @csrf
        @if($errors->any())
            <p>{{ $errors->first() }}</p>
        @endif

        <input type="text" name="name" placeholder="Enter Your Full name" value="{{ old('name') }}">
        <input type="email" name="email" placeholder="Enter Your valid email" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Enter New Password">
        <input type="password" name="password_confirmation" placeholder="Enter confirm password">

        <button type="submit">Register</button>
    </form>
    <a href="/login">Already have an account? Login</a>
</body>
</html>