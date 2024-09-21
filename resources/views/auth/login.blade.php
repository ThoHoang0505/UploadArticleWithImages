<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="TenDangNhap">Tên đăng nhập:</label>
            <input type="text" id="TenDangNhap" name="TenDangNhap" required>
        </div>
        <div>
            <label for="MatKhau">Mật khẩu:</label>
            <input type="password" id="MatKhau" name="MatKhau" required>
        </div>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>
