@extends('layouts.app')

@section('title', 'Login')
@section('heading', 'Login Admin')

@section('content')
    <h2>Masuk ke Sistem</h2>
    <p>Silakan login untuk mengelola data kepegawaian.</p>

    @if ($errors->any())
        <div style="color: #b91c1c; margin-bottom: 15px;">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 18px;">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                value="{{ old('email') }}" required>
        </div>

        <div style="margin-bottom: 18px;">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                required>
        </div>

        <button type="submit">Login</button>
    </form>

    <p style="margin-top: 20px;">
        Belum punya akun?
        <a href="{{ route('register') }}">Daftar di sini</a>
    </p>
@endsection
