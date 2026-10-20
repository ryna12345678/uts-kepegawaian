@extends('layouts.app')

@section('title', 'Data Departemen')
@section('heading', 'Data Departemen')

@section('content')
    <div style="display: flex; justify-content: space-between;
        align-items: center; gap: 12px; flex-wrap: wrap;
        margin-bottom: 20px;">
        <div>
            <h2 style="margin-bottom: 5px;">Daftar Departemen</h2>
            <p style="color: #64748b; margin-top: 0;">
                Kelola departemen perusahaan.
            </p>
        </div>

        <a href="{{ route('departments.create') }}"
           style="background: #4338ca; color: white;
           padding: 12px 16px; border-radius: 8px;
           text-decoration: none;">
            + Tambah Departemen
        </a>
    </div>

    @if ($departments->count() > 0)
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #eef2ff; text-align: left;">
                        <th style="padding: 14px;">No.</th>
                        <th style="padding: 14px;">Nama Departemen</th>
                        <th style="padding: 14px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($departments as $department)
                        <tr style="border-bottom: 1px solid #e2e8f0;">
                            <td style="padding: 14px;">
                                {{ $loop->iteration }}
                            </td>

                            <td style="padding: 14px;">
                                {{ $department->name }}
                            </td>

                            <td style="padding: 14px;">
                                <a href="{{ route('departments.edit', $department) }}"
                                   style="color: #4338ca; margin-right: 12px;">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('departments.destroy', $department) }}"
                                    method="POST"
                                    style="display: inline;"
                                    onsubmit="return confirm('Yakin ingin menghapus departemen ini?')">
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
            <h3>Belum Ada Departemen</h3>
            <p>Silakan tambahkan departemen terlebih dahulu.</p>
        </div>
    @endif
@endsection
