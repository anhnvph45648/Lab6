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
    <div class="container w-40">
        <h2 class="mt-5">cap nhat thong tin</h2>
        @session('message')
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endsession
        <form action="{{ route('updateUser', $user) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="" class="form-label">Fullname</label>
                <input type="text" name="fullname" id="" class="form-control"
                    value="{{ Auth::user()->fullname }}">
                @error('fullname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" id="" class="form-control"
                    value="{{ Auth::user()->username }}">
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="" class="form-control"
                    value="{{ Auth::user()->email }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" id="" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label for="" class="form-label">Role</label>
                <input type="role" name="role" id="" class="form-control"
                    value="{{ Auth::user()->role }}">

            </div>
            <div class="mb-3">
                <label for="" class="form-label">Active</label>
                <input type="text" name="active" id="" class="form-control"
                    value="{{ Auth::user()->active }}">
                @error('active')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Avatar</label>
                <img src="{{ Storage::url($user->avatar) }}" alt=""  width="100">

                {{-- <img src="{{Auth::user()->avatar}}" alt="" width="100px"> --}} 
                <input type="file" name="avatar" id="" class="form-control" value="">
              
                @error('avatar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
                {{-- <a href="{{ route('register') }}" class="btn btn-info">Register</a> --}}
            </div>


        </form>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
</body>

</html>
