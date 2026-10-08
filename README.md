# Практическая работа №38: Создание и обработка форм в Laravel

Проект представляет собой веб-приложение для учета и управления мероприятиями, созданное в рамках практической работы №38.

## 🚀 Назначение проекта

Приложение реализует паттерн **MVC (Model-View-Controller)** и демонстрирует:
- Работу с базой данных через **Eloquent ORM** (модель `Event`).
- Защиту от **CSRF-атак** с использованием директивы `@csrf`.
- Валидацию пользовательских данных на стороне сервера (`$request->validate()`)[cite: 1].
- Реализацию **GET/POST** форм и безопасного редиректа после создания записи (Post-Redirect-Get)[cite: 1].
- Поиск записей по базе данных с сохранением состояния формы поиска[cite: 1].

---

## 🛠 Технологический стек

- **PHP**: ^8.2
- **Laravel Framework**: ^11.0 / ^12.0 / ^13.0
- **База данных**: SQLite / PostgreSQL
- **Шаблонизатор**: Blade[cite: 1]

---

## 📁 Структура ключевых файлов

| Путь к файлу | Назначение |
| :--- | :--- |
| `app/Models/Event.php` | Модель Eloquent с настройкой массового заполнения `$fillable` |
| `app/Http/Controllers/EventController.php` | Контроллер с методами `index`, `create`, `store` |
| `database/migrations/*_create_events_table.php` | Миграция структуры таблицы `events` (`name`, `event_date`, `price`, `description`) |
| `routes/web.php` | Маршруты веб-приложения (`events.index`, `events.create`, `events.store`) |
| `resources/views/layouts/app.blade.php` | Базовый Blade-макет приложения со стилями |
| `resources/views/events/index.blade.php` | Страница списка мероприятий и формы поиска |
| `resources/views/events/create.blade.php` | Форма создания мероприятия с выводом ошибок и сохранёнными значениями `old()` |

---

## ⚙️ Быстрый запуск

1. **Применение миграций**:
   ```bash
   php artisan migrate


   это после доп доп задания
   Структура созданных и обновлённых файлов
C:\Zadania_doma\38GM
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthorController.php
│   │       ├── BookController.php
│   │       ├── BorrowingController.php
│   │       ├── DashboardController.php
│   │       └── ReaderController.php
│   └── Models/
│       ├── Author.php
│       ├── Book.php
│       ├── Borrowing.php
│       └── Reader.php
├── database/
│   ├── migrations/
│   │   ├── 2025_01_01_000001_create_authors_table.php
│   │   ├── 2025_01_01_000002_create_books_table.php
│   │   ├── 2025_01_01_000003_create_readers_table.php
│   │   └── 2025_01_01_000004_create_borrowings_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── authors/
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       ├── books/
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       ├── borrowings/
│       │   ├── create.blade.php
│       │   └── index.blade.php
│       ├── layouts/
│       │   └── app.blade.php
│       ├── readers/
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       └── dashboard.blade.php
└── routes/
    └── web.php

    