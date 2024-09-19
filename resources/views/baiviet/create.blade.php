<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Đăng tải bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <style type="text/css">
        .ck-editor__editable_inline{
            height: 450px;
        }
    </style>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow-lg">
        @if (session('success'))
            <div class="bg-green-200 p-4 rounded mb-4">{{ session('success') }}</div>
        @endif

        <form action="{{ route('baiviet.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="TieuDeBT" class="block text-gray-700">Tiêu đề</label>
                <input type="text" name="TieuDeBT" id="TieuDeBT" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="LoaiBT" class="block text-gray-700">Loại tin</label>
                <input type="text" name="LoaiBT" id="LoaiBT" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="NoiDungBT" class="block text-gray-700">Nội dung</label>
                <textarea id="editor" name="NoiDungBT"></textarea>
            </div>

            <div class="mb-4">
                <label for="AnhDaiDien" class="block text-gray-700">Ảnh đại diện</label>
                <input type="file" name="AnhDaiDien" id="AnhDaiDien" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Đăng tải</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    ckfinder:{
                        uploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
    
</body>
</html>
