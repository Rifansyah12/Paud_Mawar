<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Reset Password</title>
</head>
<body>
    <h3>Reset Password</h3>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Masukkan email" required />
        <button type="submit">Kirim Link Reset</button>
    </form>
</body>
</html>
