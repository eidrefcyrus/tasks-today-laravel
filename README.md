# Tasks for Today Management System

A Laravel web application that displays daily tasks, a complete task list, a demo user profile, and developer information.

## Developer

Eidref Cyrus Bauza

## Features

- Welcome page that displays only tasks scheduled for today
- Task List page that displays every task ordered by date
- Profile page that displays one demo user
- Static About page
- Laravel migrations, seeders, Eloquent models, controller, and Blade views

## Pages

| Page | URL |
|---|---|
| Welcome | `/` |
| Task List | `/tasks` |
| Profile | `/profile` |
| About | `/about` |

## Local Setup

1. Start Apache and MySQL in XAMPP.
2. Create a MySQL database named `tasks_today_laravel`.
3. Configure these database values in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tasks_today_laravel
DB_USERNAME=root
DB_PASSWORD=

## Hosted Application

https://eidref-tasks-laravel.great-site.net/