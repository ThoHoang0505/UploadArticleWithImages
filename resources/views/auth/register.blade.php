<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Đăng ký</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="TenDangNhap" class="block text-sm font-medium text-gray-700">Tên đăng nhập</label>
                    <input type="text" name="TenDangNhap" placeholder="Tên đăng nhập" required
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="MatKhau" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                    <input type="password" name="MatKhau" placeholder="Mật khẩu" required
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="MatKhau_confirmation" class="block text-sm font-medium text-gray-700">Nhập lại mật khẩu</label>
                    <input type="password" name="MatKhau_confirmation" placeholder="Nhập lại mật khẩu" required
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="TenDG" class="block text-sm font-medium text-gray-700">Tên độc giả</label>
                    <input type="text" name="TenDG" placeholder="Tên độc giả" required
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="Email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="Email" placeholder="Email" required
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="NgaySinh" class="block text-sm font-medium text-gray-700">Ngày sinh</label>
                    <input type="date" name="NgaySinh" required
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="SDT" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                    <input type="text" name="SDT" placeholder="Số điện thoại" required
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="DiaChi" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                    <input type="text" name="DiaChi" placeholder="Địa chỉ" required
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-6">
                    <label for="GioiTinh" class="block text-sm font-medium text-gray-700">Giới tính</label>
                    <select name="GioiTinh" required
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>

                <div class="flex justify-center">
                    <button type="submit" 
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Đăng ký
                    </button>
                </div>
            </form>

            <p class="text-center text-sm text-gray-600 mt-4">
                Đã có tài khoản? <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">Đăng nhập</a>.
            </p>
        </div>
    </div>
</body>
</html>
