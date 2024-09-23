<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Đăng nhập</h2>

            @if (session('success'))
                <p class="text-green-600 text-center mb-4">{{ session('success') }}</p>
            @endif

            @if ($errors->has('login_error'))
                <p class="text-red-600 text-center mb-4">{{ $errors->first('login_error') }}</p>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="TenDangNhap" class="block text-sm font-medium text-gray-700">Tên đăng nhập</label>
                    <input type="text" id="TenDangNhap" name="TenDangNhap" required
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           placeholder="Nhập tên đăng nhập">
                </div>

                <div class="mb-4">
                    <label for="MatKhau" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                    <input type="password" id="MatKhau" name="MatKhau" required
                           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                           placeholder="Nhập mật khẩu">
                </div>

                <div class="flex justify-center">
                    <button type="submit" 
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Đăng nhập
                    </button>
                </div>
            </form>

            <p class="text-center text-sm text-gray-600 mt-4">
                Chưa có tài khoản? <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-500">Đăng ký ngay</a>.
            </p>
        </div>
    </div>
</body>
</html>
