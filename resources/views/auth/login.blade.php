<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="/login">
        @csrf
        @if($errors->any())
            <p>{{ $errors->first() }}</p>
        @endif
        <input type="email" name="email" placeholder="Your registered email">
        <input type="password" name="password" placeholder="Your Password">
        <button type="submit">Login</button>
    </form>
    <a href="/register">Don't have an account? Register</a>
</body>
</html>