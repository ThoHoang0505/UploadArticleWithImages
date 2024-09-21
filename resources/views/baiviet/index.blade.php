<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <!-- Thanh điều hướng với các nút -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Danh Sách Bài Viết</h1>

            <!-- Kiểm tra người dùng đã đăng nhập hay chưa -->
            <div>
                @if(Auth::check())
                    <p class="text-gray-700">Xin chào, {{ Auth::user()->TenDangNhap }}!</p>
                    <form action="{{ route('dangxuat') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                            Đăng xuất
                        </button>
                    </form>
                @else
                    <a href="{{ route('dangnhap') }}" class="text-blue-500">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="text-blue-500">Đăng ký</a>
                @endif
            </div>
        </div>
        <!-- Kiểm tra nếu có bài viết trong danh sách -->
        @if($baiviets->isEmpty())
            <p class="text-gray-600 text-center">Chưa có bài viết nào.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($baiviets as $baiviet)
                    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                        <!-- Hiển thị Tiêu đề -->
                        <h2 class="text-2xl font-semibold mb-2">{{ $baiviet->TieuDeBT }}</h2>
                        
                        <!-- Hiển thị Loại bài viết và Thời gian đăng -->
                        <p class="text-gray-600 mb-4">
                            <span class="font-bold">{{ $baiviet->LoaiBT }}</span> - 
                            <span>{{ \Carbon\Carbon::parse($baiviet->NgayDang)->format('d/m/Y H:i') }}</span>
                        </p>
                        
                        <!-- Hiển thị Ảnh đại diện -->
                        @if($baiviet->AnhDaiDien)
                            <img src="{{ asset('storage/' . $baiviet->AnhDaiDien) }}" alt="Ảnh đại diện" class="w-full h-40 object-cover mb-4 rounded-md">
                        @endif

                        <!-- Lọc và hiển thị nội dung thẻ <h2> hoặc đoạn văn đầu tiên -->
                        <div class="prose line-clamp-3 text-gray-700">
                            {!! preg_match('/<h2>(.*?)<\/h2>/', $baiviet->NoiDungBT, $matches) ? $matches[1] : strip_tags(\Illuminate\Support\Str::limit($baiviet->NoiDungBT, 150)) !!}
                        </div>

                        <!-- Nút Xem chi tiết -->
                        <a href="{{ route('baiviet.show', ['MaBT' => $baiviet->MaBT]) }}" class="text-indigo-600 hover:text-indigo-800 mt-4 inline-block">Xem chi tiết</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
