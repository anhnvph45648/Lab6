<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>


    <div class="container">
        <h2>Thay đổi mật khẩu</h2>
        @session('message')
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endsession
        @session('error_pass')
            <div class="alert alert-info">
                {{ session('error_pass') }}
            </div>
        @endsession


        <form method="POST" action="{{ route('updatePassword') }}">
            @csrf
            <div class="mb-3">
                <label for="">Mật khẩu hiện tại:</label>
                <input type="password" name="current_password"class="form-control"
                    value="{{ old('current_password') }}">
                @error('current_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

               

            </div>
            <div class="mb-3">
                <label for="">Mật khẩu mới:</label>
                <input type="password" name="new_password" class="form-control" value="{{ old('new_password') }}">
                @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="mb-3">
                <label for="">Mật khẩu mới:</label>
                <input type="password" name="new_password_confirmation"
                    class="form-control"value="{{ old('new_password_confirmation') }}">

                @error('new_password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Đổi mật khẩu</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
