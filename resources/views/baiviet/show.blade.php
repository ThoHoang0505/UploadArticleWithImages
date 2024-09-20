<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

    <div class="container mx-auto bg-white rounded-lg shadow-lg p-6 max-w-3xl">
        <!-- Nút quay về trang index -->
        <div class="mb-6">
            <a href="{{ route('baiviet.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                Quay về trang chủ
            </a>
        </div>

        <h1 class="text-5xl font-bold mb-2">{{ $baiviet->TieuDeBT }}</h1>

        <div class="flex items-center justify-between mb-4 text-gray-600">
            <p class="text-xl"><strong>Loại Tin:</strong> {{ $baiviet->LoaiBT }}</p>
            <p class="text-xl"><strong>Lượt xem:</strong> {{ $baiviet->luot_xem }}</p>
        </div>

        @if($baiviet->AnhDaiDien)
            <img src="{{ asset('storage/' . $baiviet->AnhDaiDien) }}" alt="Ảnh đại diện" class="w-full h-80 object-cover mb-4 rounded-lg shadow-md">
        @endif

        <div class="prose mb-8 text-lg">
            {!! $baiviet->NoiDungBT !!}
        </div>

        <!-- Nút quay về trang index dưới cùng -->
        <div class="mt-8 text-center">
            <a href="{{ route('baiviet.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                Quay về trang chủ
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const oembedElements = document.querySelectorAll('oembed[url]');
            oembedElements.forEach(element => {
                const url = element.getAttribute('url');
                const iframe = document.createElement('iframe');
                iframe.setAttribute('width', '560');
                iframe.setAttribute('height', '315');
                iframe.setAttribute('src', url.replace("watch?v=", "embed/"));
                iframe.setAttribute('frameborder', '0');
                iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
                iframe.setAttribute('allowfullscreen', true);
                element.parentNode.replaceChild(iframe, element);
            });
        });
    </script>

</body>
</html>
