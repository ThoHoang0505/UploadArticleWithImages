<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>
<body>
    <h2>Đăng ký</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="TenDangNhap" placeholder="Tên đăng nhập" required>
        <input type="password" name="MatKhau" placeholder="Mật khẩu" required>
        <input type="password" name="MatKhau_confirmation" placeholder="Nhập lại mật khẩu" required>
        <input type="text" name="TenDG" placeholder="Tên độc giả" required>
        <input type="email" name="Email" placeholder="Email" required>
        <input type="date" name="NgaySinh" required>
        <input type="text" name="SDT" placeholder="Số điện thoại" required>
        <input type="text" name="DiaChi" placeholder="Địa chỉ" required>
        <select name="GioiTinh" required>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
        <button type="submit">Đăng ký</button>
    </form>      
</body>
</html>
