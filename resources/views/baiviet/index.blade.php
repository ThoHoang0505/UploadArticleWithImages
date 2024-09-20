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
        <h1 class="text-3xl font-bold mb-8">Danh Sách Bài Viết</h1>

        <!-- Kiểm tra nếu có bài viết trong danh sách -->
        @if($baiviets->isEmpty())
            <p>Chưa có bài viết nào.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($baiviets as $baiviet)
                    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                        <!-- Hiển thị Tiêu đề -->
                        <h2 class="text-2xl font-semibold mb-2">{{ $baiviet->TieuDeBT }}</h2>

                        <!-- Hiển thị Loại bài viết -->
                        <p class="text-gray-600 mb-4">{{ $baiviet->LoaiBT }}</p>

                        <!-- Hiển thị Ảnh đại diện -->
                        @if($baiviet->AnhDaiDien)
                            <img src="{{ asset('storage/' . $baiviet->AnhDaiDien) }}" alt="Ảnh đại diện" class="w-full h-40 object-cover mb-4">
                        @endif

                        <!-- Lọc và hiển thị nội dung thẻ <h2> -->
                            <div class="prose line-clamp-3">
                                {!! strip_tags(Str::limit($baiviet->NoiDungBT, 150)) !!}
                            </div>
                        <!-- Nút xem chi tiết -->
                        <a href="{{ route('baiviet.show', ['MaBT' => $baiviet->MaBT]) }}" class="text-blue-500 mt-4 inline-block">Xem chi tiết</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
