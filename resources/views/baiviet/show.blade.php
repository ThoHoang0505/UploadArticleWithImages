<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            background-color: #f9fafb;
        }
        .article-image {
            transition: transform 0.3s ease-in-out;
        }
        .article-image:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100 p-6">

    <div class="container mx-auto bg-white rounded-lg shadow-lg p-6 max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('baiviet.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                Quay về trang chủ
            </a>
        </div>

        <h1 class="text-5xl font-bold mb-4 text-gray-800">{{ $baiviet->TieuDeBT }}</h1>

        <div class="flex items-center justify-between mb-4 text-gray-600">
            <p class="text-xl"><strong>Loại Tin:</strong> {{ $baiviet->LoaiBT }}</p>
            <p class="text-xl"><strong>Lượt xem:</strong> {{ $baiviet->luot_xem }}</p>
        </div>

        @if($baiviet->AnhDaiDien)
            <img src="{{ asset('storage/' . $baiviet->AnhDaiDien) }}" alt="Ảnh đại diện" class="w-full h-96 object-cover mb-6 rounded-lg shadow-md article-image">
        @endif

        <div class="prose mb-8 text-lg text-gray-700 leading-loose">
            {!! $baiviet->NoiDungBT !!}
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="border-t pt-4">
            <h2 class="text-3xl font-semibold mb-4 text-gray-800">Bình luận</h2>

            @if($comments->isEmpty())
                <p class="text-gray-600">Chưa có bình luận nào.</p>
            @else
                <div id="comments-list" class="space-y-4">
                    @foreach($comments as $comment)
                        <div class="border p-4 rounded bg-gray-50">
                            <p class="font-bold">{{ $comment->user ? $comment->user->TenDangNhap : 'Người dùng ẩn danh' }}:</p>
                            <p class="text-gray-700">{{ $comment->NoiDung }}</p>
                            <p class="text-gray-500 text-sm mt-1">Đăng lúc: {{ \Carbon\Carbon::parse($comment->created_at)->format('H:i d/m/Y') }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        @auth
            <form id="commentForm" action="{{ route('comments.store', $baiviet->MaBT) }}" method="POST" class="mt-6">
                @csrf
                <textarea name="NoiDung" rows="3" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Nhập bình luận..."></textarea>
                <button type="submit" class="mt-4 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">Bình luận</button>
            </form>
        @else
            <p class="mt-6 text-gray-600">Bạn cần <a href="{{ route('login') }}" class="text-blue-500 hover:underline">đăng nhập</a> để bình luận.</p>
        @endauth

        <div class="mt-8 text-center">
            <a href="{{ route('baiviet.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                Quay về trang chủ
            </a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#commentForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#comments-list').prepend(`
                            <div class="border p-4 mb-2 rounded bg-gray-50">
                                <p class="font-bold">${response.username}:</p>
                                <p>${response.comment}</p>
                                <p class="text-gray-500 text-sm mt-1">Đăng lúc: ${response.created_at}</p>
                            </div>
                        `);
                        $('textarea[name="NoiDung"]').val('');
                    },
                    error: function(xhr) {
                        alert('Có lỗi xảy ra, vui lòng thử lại!');
                    }
                });
            });
        });
        //Hien link ytb
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
