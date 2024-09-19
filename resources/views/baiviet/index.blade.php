<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center">Danh Sách Bài Viết</h1>

        <!-- Kiểm tra nếu có bài viết trong danh sách -->
        @if($baiviets->isEmpty())
            <p class="text-center">Chưa có bài viết nào.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($baiviets as $baiviet)
                    <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <!-- Hiển thị Ảnh đại diện -->
                        @if($baiviet->AnhDaiDien)
                            <img src="{{ asset('storage/' . $baiviet->AnhDaiDien) }}" alt="Ảnh đại diện" class="w-full h-40 object-cover mb-4 rounded">
                        @endif

                        <!-- Hiển thị Tiêu đề -->
                        <h2 class="text-lg font-semibold mb-2">{{ $baiviet->TieuDeBT }}</h2>

                        <!-- Hiển thị Loại bài viết -->
                        <p class="text-sm text-gray-600 mb-2">{{ $baiviet->LoaiBT }}</p>

                        <!-- Hiển thị Nội dung tóm tắt -->
                        <div class="text-gray-700 text-sm line-clamp-3">
                            {!! Str::limit(strip_tags($baiviet->NoiDungBT), 100, '...') !!}
                        </div>

                        <!-- Nút xem chi tiết -->
                        <a href="{{ route('baiviet.show', ['MaBT' => $baiviet->MaBT]) }}" class="block mt-4 text-blue-500 hover:underline">Xem chi tiết</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
