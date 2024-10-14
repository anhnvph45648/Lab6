@if (Auth::check())
            <div>{{ Auth::user()->fullname }}</div>
            <a href="{{ route('editUser', Auth::user()->id) }}">Cap nhat thong tin</a>
            <a href="{{ route('editPassword') }}">Doi mat khau</a>
            <a href="{{ route('logout') }}" class="btn btn-warning">Logout</a>
@endif
<a class="nav-link" href="{{ route('users.index') }}">User</a>