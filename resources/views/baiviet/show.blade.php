<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $baiviet->TieuDeBT }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-4">{{ $baiviet->TieuDeBT }}</h1>
            <p class="text-gray-600 mb-4">{{ $baiviet->LoaiBT }} | {{ $baiviet->NgayDang }}</p>

            @if($baiviet->AnhDaiDien)
                <img src="{{ asset('storage/' . $baiviet->AnhDaiDien) }}" alt="Ảnh đại diện" class="w-full h-64 object-cover mb-6">
            @endif

            <div class="prose">
                {!! $baiviet->NoiDungBT !!}
            </div>

            <a href="{{ route('baiviet.index') }}" class="block mt-6 text-blue-500 hover:underline">Quay lại danh sách bài viết</a>
        </div>
    </div>
</body>
</html>
