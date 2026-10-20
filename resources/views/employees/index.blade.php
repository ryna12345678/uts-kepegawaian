@extends('layouts.app')

@section('title', 'Data Karyawan')
@section('heading', 'Data Karyawan')

@section('content')
    <div style="display: flex; justify-content: space-between;
        align-items: center; gap: 12px; flex-wrap: wrap;
        margin-bottom: 20px;">
        <div>
            <h2 style="margin-bottom: 5px;">Daftar Karyawan</h2>
            <p style="color: #64748b; margin-top: 0;">
                Kelola informasi karyawan perusahaan.
            </p>
        </div>

        <a href="{{ route('employees.create') }}"
            style="background: #4338ca; color: white;
            padding: 12px 16px; border-radius: 8px;
            text-decoration: none;">
            + Tambah Karyawan
        </a>
    </div>

    @if ($employees->count() > 0)
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #eef2ff; text-align: left;">
                        <th style="padding: 12px;">No.</th>
                        <th style="padding: 12px;">Nama</th>
                        <th style="padding: 12px;">Departemen</th>
                        <th style="padding: 12px;">Jabatan</th>
                        <th style="padding: 12px;">Gaji</th>
                        <th style="padding: 12px;">Tanggal Masuk</th>
                        <th style="padding: 12px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($employees as $employee)
                        <tr style="border-bottom: 1px solid #e2e8f0;">
                            <td style="padding: 12px;">
                                {{ $loop->iteration }}
                            </td>
                            <td style="padding: 12px;">
                                {{ $employee->name }}
                            </td>
                            <td style="padding: 12px;">
                                {{ $employee->department->name ?? '-' }}
                            </td>
                            <td style="padding: 12px;">
                                {{ $employee->position }}
                            </td>
                            <td style="padding: 12px;">
                                Rp {{ number_format($employee->salary, 0, ',', '.') }}
                            </td>
                            <td style="padding: 12px;">
                                {{ $employee->joined_at }}
                            </td>
                            <td style="padding: 12px; white-space: nowrap;">
                                <a href="{{ route('employees.edit', $employee) }}"
                                    style="color: #4338ca; margin-right: 10px;">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('employees.destroy', $employee) }}"
                                    method="POST"
                                    style="display: inline;"
                                    onsubmit="return confirm('Yakin ingin menghapus karyawan ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        style="background: #dc2626; color: white;
                                        border: none; padding: 7px 10px;
                                        border-radius: 5px; cursor: pointer;">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div style="text-align: center; padding: 35px;">
            <h3>Belum Ada Data Karyawan</h3>
            <p>Silakan tambahkan data karyawan terlebih dahulu.</p>
        </div>
    @endif
@endsection
