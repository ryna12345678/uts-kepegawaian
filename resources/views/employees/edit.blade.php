@extends('layouts.app')

@section('title', 'Edit Karyawan')
@section('heading', 'Edit Karyawan')

@section('content')
    <h2>Ubah Data Karyawan</h2>
    <p style="color: #64748b;">
        Perbarui informasi karyawan pada formulir berikut.
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

    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 18px;">
            <label for="name">Nama Karyawan</label>
            <input type="text" id="name" name="name"
                value="{{ old('name', $employee->name) }}" required
                style="display:block; width:100%; max-width:500px;
                padding:12px; margin-top:8px; border:1px solid #cbd5e1;
                border-radius:7px;">
        </div>

        <div style="margin-bottom: 18px;">
            <label for="department_id">Departemen</label>
            <select id="department_id" name="department_id" required
                style="display:block; width:100%; max-width:500px;
                padding:12px; margin-top:8px; border:1px solid #cbd5e1;
                border-radius:7px;">
                <option value="">-- Pilih Departemen --</option>

                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 18px;">
            <label for="position">Jabatan</label>
            <input type="text" id="position" name="position"
                value="{{ old('position', $employee->position) }}" required
                style="display:block; width:100%; max-width:500px;
                padding:12px; margin-top:8px; border:1px solid #cbd5e1;
                border-radius:7px;">
        </div>

        <div style="margin-bottom: 18px;">
            <label for="salary">Gaji</label>
            <input type="number" id="salary" name="salary" min="0" step="0.01"
                value="{{ old('salary', $employee->salary) }}" required
                style="display:block; width:100%; max-width:500px;
                padding:12px; margin-top:8px; border:1px solid #cbd5e1;
                border-radius:7px;">
        </div>

        <div style="margin-bottom: 22px;">
            <label for="joined_at">Tanggal Masuk</label>
            <input type="date" id="joined_at" name="joined_at"
                value="{{ old('joined_at', $employee->joined_at) }}" required
                style="display:block; width:100%; max-width:500px;
                padding:12px; margin-top:8px; border:1px solid #cbd5e1;
                border-radius:7px;">
        </div>

        <button type="submit"
            style="background:#4338ca; color:white; padding:12px 18px;
            border:0; border-radius:7px; cursor:pointer;">
            Simpan Perubahan
        </button>

        <a href="{{ route('employees.index') }}"
            style="margin-left:12px; color:#64748b; text-decoration:none;">
            Batal
        </a>
    </form>
@endsection
