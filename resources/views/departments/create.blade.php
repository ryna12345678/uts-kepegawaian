@extends('layouts.app')

@section('title', 'Tambah Departemen')
@section('heading', 'Tambah Departemen')

@section('content')
    <h2>Tambah Departemen Baru</h2>
    <p style="color: #64748b;">
        Masukkan nama departemen yang ingin ditambahkan.
    </p>

    @if ($errors->any())
        <div style="background: #fee2e2; color: #991b1b;
            padding: 12px; border-radius: 8px; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; margin-bottom: 8px;">
                Nama Departemen
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Contoh: Keuangan"
                required
                style="width: 100%; max-width: 500px;
                padding: 12px; border: 1px solid #cbd5e1;
                border-radius: 7px;"
            >
        </div>

        <button type="submit"
            style="background: #4338ca; color: white;
            padding: 12px 18px; border: none;
            border-radius: 7px; cursor: pointer;">
            Simpan Departemen
        </button>

        <a href="{{ route('departments.index') }}"
            style="margin-left: 12px; color: #64748b;
            text-decoration: none;">
            Batal
        </a>
    </form>
@endsection
