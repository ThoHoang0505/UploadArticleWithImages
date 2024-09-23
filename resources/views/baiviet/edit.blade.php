<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chỉnh sửa bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <style type="text/css">
        .ck-editor__editable_inline {
            height: 450px;
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow-lg">
        <h1 class="text-3xl font-bold mb-4">Chỉnh sửa bài viết</h1>

        <form action="{{ route('baiviet.update', $baiviet->MaBT) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="TieuDeBT" class="block text-gray-700">Tiêu đề</label>
                <input type="text" name="TieuDeBT" id="TieuDeBT" value="{{ $baiviet->TieuDeBT }}" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="NoiDungBT" class="block text-gray-700">Nội dung</label>
                <textarea id="editor" name="NoiDungBT">{{ $baiviet->NoiDungBT }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cập nhật</button>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
