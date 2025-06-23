@extends('adminlte::auth.register')

@section('auth_body')
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Full name" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <select name="type" class="form-control" required>
                <option value="">-- Pilih Tipe User --</option>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
                <option value="user">User</option>
            </select>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-users"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-block btn-primary">
            <span class="fas fa-user-plus"></span> Register
        </button>
    </form>
@endsection
