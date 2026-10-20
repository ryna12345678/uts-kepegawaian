
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            padding: 30px;
            color: #2d3748;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        input, select {
            width: 100%;
            padding: 11px;
            margin-top: 7px;
            margin-bottom: 17px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            background: #4338ca;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
        }

        a {
            color: #4338ca;
            text-decoration: none;
        }

        .error {
            color: #dc2626;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Karyawan</h1>
        <p><a href="{{ route('employees.index') }}">← Kembali ke Data Karyawan</a></p>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            <label>Nama Karyawan</label>
            <input type="text" name="name" value="{{ old('name') }}" required>

            <label>Departemen</label>
            <select name="department_id" required>
                <option value="">-- Pilih Departemen --</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ old('department_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>

            <label>Jabatan</label>
            <input type="text" name="position" value="{{ old('position') }}" required>

            <label>Gaji</label>
            <input type="number" name="salary" min="0" step="0.01"
                value="{{ old('salary') }}" required>

            <label>Tanggal Masuk</label>
            <input type="date" name="joined_at" value="{{ old('joined_at') }}" required>

            <button type="submit">Simpan Karyawan</button>
        </form>
    </div>
</body>
</html>
