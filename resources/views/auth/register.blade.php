@extends('layouts.app')

@section('title', 'Registrasi')
@section('heading', 'Registrasi Akun')

@section('content')
    <h2>Buat Akun Baru</h2>
    <p>Daftarkan akun untuk mengakses Sistem Informasi Kepegawaian.</p>

    @if ($errors->any())
        <div style="color: #b91c1c; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 18px;">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name"
                value="{{ old('name') }}" required
                style="display:block; width:100%; max-width:450px;
                padding:12px; margin-top:8px; border:1px solid #cbd5e1;
                border-radius:7px;">
        </div>

        <div style="margin-bottom: 18px;">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                value="{{ old('email') }}" required
                style="display:block; width:100%; max-width:450px;
                padding:12px; margin-top:8px; border:1px solid #cbd5e1;
                border-radius:7px;">
        </div>

        <div style="margin-bottom: 18px;">
            <label for="password">Password (minimal 8 karakter)</label>
            <input type="password" id="password" name="password"
                required minlength="8"
                style="display:block; width:100%; max-width:450px;
                padding:12px; margin-top:8px; border:1px solid #cbd5e1;
                border-radius:7px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation"
                name="password_confirmation" required minlength="8"
                style="display:block; width:100%; max-width:450px;
                padding:12px; margin-top:8px; border:1px solid #cbd5e1;
                border-radius:7px;">
        </div>

        <button type="submit"
            style="background:#4338ca; color:white; padding:12px 20px;
            border:0; border-radius:7px; cursor:pointer;">
            Daftar
        </button>
    </form>

    <p style="margin-top:20px;">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login di sini</a>
    </p>
@endsection
