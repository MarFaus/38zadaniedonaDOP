<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Управление мероприятиями')</title>
    <style>
        :root {
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-color: #1e293b;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --border: #e2e8f0;
            --error-bg: #fef2f2;
            --error-text: #991b1b;
            --success-bg: #f0fdf4;
            --success-text: #166534;
        }
        body {
            font-family: system-ui, -apple-system, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        .container {
            width: 100%;
            max-width: 800px;
            background: var(--card-bg);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        h1, h2 { margin-top: 0; }
        .btn {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        .btn:hover { background-color: var(--primary-hover); }
        .alert-success {
            background-color: var(--success-bg);
            color: var(--success-text);
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .alert-error {
            background-color: var(--error-bg);
            color: var(--error-text);
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 6px; font-weight: 600; }
        input[type="text"], input[type="date"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border);
            border-radius: 6px;
            box-sizing: border-box;
        }
        .card {
            border: 1px solid var(--border);
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 12px;
        }
        .flex-row {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>