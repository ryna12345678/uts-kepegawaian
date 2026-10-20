
@extends('layouts.app')

@section('title', 'Dashboard Kepegawaian')
@section('heading', 'Dashboard')

@section('content')
    <h1>Selamat Datang!</h1>
    <p>
        Selamat datang di Sistem Informasi Kepegawaian.
        Kelola data departemen dan karyawan melalui menu di sebelah kiri.
    </p>

    <div style="display: grid; grid-template-columns:
        repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;
        margin-top: 25px;">

        <div style="padding: 24px; background: #eef2ff;
            border-radius: 12px;">
            <h3>Data Departemen</h3>
            <p>Kelola departemen perusahaan.</p>
            <a href="{{ route('departments.index') }}">
                Buka Data Departemen →
            </a>
        </div>

        <div style="padding: 24px; background: #f3e8ff;
            border-radius: 12px;">
            <h3>Data Karyawan</h3>
            <p>Kelola informasi karyawan perusahaan.</p>
            <a href="{{ route('employees.index') }}">
                Buka Data Karyawan →
            </a>
        </div>
    </div>
@endsection
