
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Kepegawaian')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #273047;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 245px;
            padding: 25px 16px;
            background: #312e81;
            color: white;
            overflow-y: auto;
        }

        .brand {
            font-size: 18px;
            font-weight: bold;
            line-height: 1.5;
            margin: 0 8px 35px;
        }

        .sidebar a {
            display: block;
            padding: 13px 14px;
            margin-bottom: 8px;
            color: #e0e7ff;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #4f46e5;
            color: white;
        }

        .logout-form {
            margin-top: 30px;
            padding-top: 18px;
            border-top: 1px solid #4b478d;
        }

        .logout-button {
            width: 100%;
            padding: 12px 14px;
            background: #dc2626;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            text-align: left;
        }

        .logout-button:hover {
            background: #b91c1c;
        }

        .main {
            margin-left: 245px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 18px 22px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px #00000008;
        }

        .topbar strong {
            font-size: 18px;
        }

        .content {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px #00000008;
            overflow-x: auto;
        }

        .alert {
            padding: 12px 16px;
            margin-bottom: 18px;
            background: #dcfce7;
            color: #166534;
            border-radius: 8px;
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                bottom: auto;
            }

            .brand {
                margin-bottom: 20px;
            }

            .main {
                margin-left: 0;
                padding: 15px;
            }

            .content {
                padding: 18px;
            }
        }
    </style>
</head>
<body>

    @auth
        <aside class="sidebar">
            <div class="brand">
                Sistem Informasi<br>
                Kepegawaian
            </div>

            <a href="{{ url('/') }}"
               class="{{ request()->is('/') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('departments.index') }}"
               class="{{ request()->is('departments*') ? 'active' : '' }}">
                Data Departemen
            </a>

            <a href="{{ route('employees.index') }}"
               class="{{ request()->is('employees*') ? 'active' : '' }}">
                Data Karyawan
            </a>

            <form action="{{ route('logout') }}"
                  method="POST"
                  class="logout-form">
                @csrf

                <button type="submit" class="logout-button">
                    Logout
                </button>
            </form>
        </aside>
    @endauth

    <main class="main">
        <div class="topbar">
            <strong>
                @yield('heading', 'Dashboard')
            </strong>

            @auth
                <span>Administrator</span>
            @endauth
        </div>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <section class="content">
            @yield('content')
        </section>
    </main>

</body>
</html>
