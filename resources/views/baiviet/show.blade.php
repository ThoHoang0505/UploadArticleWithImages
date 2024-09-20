<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

    <div class="container mx-auto">
        <!-- Nút quay về trang index -->
        <div class="mb-6">
            <a href="{{ route('baiviet.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                Quay về trang chủ
            </a>
        </div>

        <h1 class="text-3xl font-bold mb-8">{{ $baiviet->TieuDeBT }}</h1>

        <p class="text-gray-600 mb-4">{{ $baiviet->LoaiBT }}</p>

        @if($baiviet->AnhDaiDien)
            <img src="{{ asset('storage/' . $baiviet->AnhDaiDien) }}" alt="Ảnh đại diện" class="w-full h-64 object-cover mb-4">
        @endif

        <div class="prose">
            {!! $baiviet->NoiDungBT !!}
        </div>

        <!-- Nút quay về trang index dưới cùng -->
        <div class="mt-8">
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
