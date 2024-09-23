<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Bài Viết</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 15px -3px rgba(0, 0, 0, 0.1), 0px 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Quản Lý Bài Viết</h1>
            <div>
                @if(Auth::check())
                    <p class="text-gray-700">Xin chào, <span class="font-semibold">{{ Auth::user()->TenDangNhap }}</span>!</p>
                    <form action="{{ route('dangxuat') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">
                            Đăng xuất
                        </button>
                    </form>
                @else
                    <a href="{{ route('dangnhap') }}" class="text-blue-500 hover:underline mr-4">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Đăng ký</a>
                @endif
            </div>
        </div>
        
        @if($baiviets->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($baiviets as $baiviet)
                    <div class="block bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1 news-card">
                        <h2 class="text-xl font-semibold mb-2 text-gray-800">{{ $baiviet->TieuDeBT }}</h2>

                        <p class="text-gray-600 mb-4">
                            <span class="font-bold text-gray-700">{{ $baiviet->LoaiBT }}</span> - 
                            <span>{{ \Carbon\Carbon::parse($baiviet->NgayDang)->format('d/m/Y H:i') }}</span>
                        </p>
                        @if($baiviet->AnhDaiDien)
                            <img src="{{ asset('storage/' . $baiviet->AnhDaiDien) }}" alt="Ảnh đại diện" class="w-full h-40 object-cover mb-4 rounded-lg shadow-sm">
                        @endif

                        <div class="prose line-clamp-3 text-gray-700">
                            {!! preg_match('/<h2>(.*?)<\/h2>/', $baiviet->NoiDungBT, $matches) ? $matches[1] : strip_tags(\Illuminate\Support\Str::limit($baiviet->NoiDungBT, 150)) !!}
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('baiviet.edit', $baiviet->MaBT) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                                Chỉnh sửa
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 text-center mt-4">Chưa có bài viết nào.</p>
        @endif
    </div>
</body>
</html>
