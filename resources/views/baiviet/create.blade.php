<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Đăng tải bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <style type="text/css">
        .ck-editor__editable_inline {
            height: 450px;
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow-lg">
        @if (session('success'))
            <div class="bg-green-200 p-4 rounded mb-4">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="bg-red-200 p-4 rounded mb-4">{{ session('error') }}</div>
        @endif

        <form action="{{ route('baiviet.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="TieuDeBT" class="block text-gray-700">Tiêu đề</label>
                <input type="text" name="TieuDeBT" id="TieuDeBT" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="loaiTin" class="block text-gray-700">Chọn Loại Tin</label>
                <select name="loaiTin[]" id="loaiTin" class="mt-1 block w-full p-2 border border-gray-300 rounded bg-white" multiple>
                    @foreach($loaitin as $lt)
                        <option value="{{ $lt->MaLT }}">{{ $lt->TenLT }}</option>
                    @endforeach
                </select>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loaiTin').select2({
                placeholder: 'Chọn loại tin',
                allowClear: true
            });

            ClassicEditor
                .create(document.querySelector('#editor'), {
                    ckfinder: {
                        uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
</body>
</html>
