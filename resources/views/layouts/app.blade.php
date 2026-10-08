<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ИС Библиотека')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-main: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --border: #e2e8f0;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', system-ui, -apple-system, sans-serif; background-color: var(--bg-main); color: var(--text-main); line-height: 1.5; }
        
        .navbar { background: #1e293b; color: white; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        .navbar-brand { font-size: 1.25rem; font-weight: 700; color: white; text-decoration: none; display: flex; align-items: center; gap: 0.5rem; }
        .nav-links { display: flex; gap: 1rem; list-style: none; }
        .nav-links a { color: #94a3b8; text-decoration: none; font-weight: 500; padding: 0.5rem 0.75rem; border-radius: 0.375rem; transition: all 0.2s; }
        .nav-links a:hover, .nav-links a.active { color: white; background-color: #334155; }

        .container { max-width: 1200px; margin: 2rem auto; padding: 0 1rem; }
        .card { background: var(--card-bg); border-radius: 0.75rem; border: 1px solid var(--border); padding: 1.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.05); margin-bottom: 1.5rem; }
        .header-actions { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
        
        .btn { display: inline-flex; align-items: center; justify-content: center; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 500; font-size: 0.875rem; cursor: pointer; text-decoration: none; border: none; transition: background-color 0.2s; gap: 0.375rem; }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-hover); }
        .btn-secondary { background: #e2e8f0; color: #334155; }
        .btn-secondary:hover { background: #cbd5e1; }
        .btn-success { background: var(--success); color: white; }
        .btn-success:hover { background: #059669; }
        .btn-danger { background: var(--danger); color: white; }
        .btn-danger:hover { background: #dc2626; }
        .btn-sm { padding: 0.25rem 0.5rem; font-size: 0.75rem; }

        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.375rem; color: #334155; }
        .form-control { width: 100%; padding: 0.625rem; border: 1px solid var(--border); border-radius: 0.375rem; font-size: 0.875rem; font-family: inherit; }
        .form-control:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1); }
        .form-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; }

        .table-responsive { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem; }
        th { background: #f1f5f9; padding: 0.75rem 1rem; font-weight: 600; color: #475569; border-bottom: 1px solid var(--border); }
        td { padding: 0.75rem 1rem; border-bottom: 1px solid var(--border); color: #334155; }
        tr:hover { background-color: #f8fafc; }

        .badge { display: inline-block; padding: 0.25rem 0.5rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; }
        .badge-success { background: #d1fae5; color: #065f46; }
        .badge-warning { background: #fef3c7; color: #92400e; }
        .badge-secondary { background: #f1f5f9; color: #475569; }

        .alert { padding: 1rem; border-radius: 0.375rem; margin-bottom: 1rem; font-size: 0.875rem; }
        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert-danger { background: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; }

        .grid-stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1.5rem; }
        .stat-card { background: white; padding: 1.25rem; border-radius: 0.75rem; border: 1px solid var(--border); }
        .stat-card .num { font-size: 1.875rem; font-weight: 700; color: var(--primary); }
        .stat-card .label { color: var(--text-muted); font-size: 0.875rem; font-weight: 500; }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('dashboard') }}" class="navbar-brand">
            📚 ИС «Библиотека»
        </a>
        <ul class="nav-links">
            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Главная</a></li>
            <li><a href="{{ route('books.index') }}" class="{{ request()->routeIs('books.*') ? 'active' : '' }}">Книги</a></li>
            <li><a href="{{ route('authors.index') }}" class="{{ request()->routeIs('authors.*') ? 'active' : '' }}">Авторы</a></li>
            <li><a href="{{ route('readers.index') }}" class="{{ request()->routeIs('readers.*') ? 'active' : '' }}">Читатели</a></li>
            <li><a href="{{ route('borrowings.index') }}" class="{{ request()->routeIs('borrowings.*') ? 'active' : '' }}">Выдача книг</a></li>
        </ul>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>