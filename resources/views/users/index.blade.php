@extends('layout')

@section('content')
    <div class="container">
        <h2>Quản lý người dùng</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->active)
                                <span class="badge bg-success">Hoạt động</span>
                            @else
                                <span class="badge bg-danger">Ngừng hoạt động</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->active)
                                <form action="{{ route('users.deactivate', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Ngừng hoạt động</button>
                                </form>
                            @else
                                <form action="{{ route('users.activate', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Kích hoạt</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
