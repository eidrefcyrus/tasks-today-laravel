# Tasks for Today Management System

A Laravel web application for managing daily tasks. It includes task CRUD, soft deletion, Laravel Breeze authentication, and a task-completed email notification using Laravel's log mail driver.

## Developer

Eidref Cyrus Bauza

## Features

- Public Welcome, Task List, Profile, and About pages
- Create, edit, and archive tasks for authenticated users only
- Validation for task title, status, and task date
- Soft deletion using the `is_archived` column
- Laravel Breeze login and registration
- Email notification logged when a task changes from `pending` to `done`
- Duplicate notifications are prevented for tasks already marked `done`

## Pages

| Page | URL |
|---|---|
| Welcome | `/` |
| Task List | `/tasks` |
| Profile | `/profile` |
| About | `/about` |
| Login | `/login` |
| Register | `/register` |

## Local Setup

1. Start Apache and MySQL in XAMPP.
2. Create a MySQL database named `tasks_today_laravel`.
3. Configure `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tasks_today_laravel
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=log
TASK_NOTIFICATION_EMAIL=eidrefcyrus@gmail.com