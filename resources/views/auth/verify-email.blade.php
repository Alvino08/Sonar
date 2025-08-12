<!DOCTYPE html>
<html>
<head>
    <title>Verify Email</title>
</head>
<body>
    <h1>Verify Your Email Address</h1>

    @if (session('message'))
        <p style="color: green;">{{ session('message') }}</p>
    @endif

    <p>Check your inbox and click the verification link.</p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Resend Verification Email</button>
    </form>
</body>
</html>
