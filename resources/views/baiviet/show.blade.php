<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

        <!-- Hiển thị thông báo thành công -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Phần bình luận -->
        <h2 class="text-2xl mb-4">Bình luận</h2>

        @if($comments->isEmpty())
            <p>Chưa có bình luận nào.</p>
        @else
            <div id="comments-list">
                @foreach($comments as $comment)
                    <div class="border p-4 mb-2 rounded bg-gray-50">
                        <p class="font-bold">{{ $comment->user ? $comment->user->TenDangNhap : 'Người dùng ẩn danh' }}:</p>
                        <p>{{ $comment->NoiDung }}</p>
                        <p class="text-gray-500 text-sm mt-1">Đăng lúc: {{ $comment->created_at->format('H:i d/m/Y') }}</p>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Form bình luận -->
        @auth
            <form id="commentForm" action="{{ route('comments.store', $baiviet->MaBT) }}" method="POST" class="mt-4">
                @csrf
                <textarea name="NoiDung" rows="3" class="w-full border rounded p-2" placeholder="Nhập bình luận..."></textarea>
                <button type="submit" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Bình luận</button>
            </form>
        @else
            <p class="mt-4">Bạn cần <a href="{{ route('login') }}" class="text-blue-500 underline">đăng nhập</a> để bình luận.</p>
        @endauth

        <!-- Nút quay về trang index dưới cùng -->
        <div class="mt-8 text-center">
            <a href="{{ route('baiviet.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                Quay về trang chủ
            </a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#commentForm').on('submit', function(e) {
                e.preventDefault(); // Ngăn chặn tải lại trang

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Thêm bình luận mới vào danh sách
                        $('#comments-list').prepend(`
                            <div class="border p-4 mb-2 rounded bg-gray-50">
                                <p class="font-bold">${response.username}:</p>
                                <p>${response.comment}</p>
                                <p class="text-gray-500 text-sm mt-1">Đăng lúc: ${response.created_at}</p>
                            </div>
                        `);
                        // Xóa nội dung textarea
                        $('textarea[name="NoiDung"]').val('');
                    },
                    error: function(xhr) {
                        alert('Có lỗi xảy ra, vui lòng thử lại!');
                    }
                });
            });
        });

        // Chuyển đổi oembed thành iframe
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
