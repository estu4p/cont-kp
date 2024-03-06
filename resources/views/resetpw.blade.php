<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form method="POST" action="{{ route('password.reset') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Send OTP</button>
    </form>
</body>
</html>
