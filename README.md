# Task Manager
A Laravel-based task management application built as a portfolio project to demonstrate backend development skills.

## Tech Stack
- **Framework:** Laravel 13
- **Language:** PHP 8.4
- **Database:** MySQL 8.0
- **Environment:** Docker

## Features
- User authentication (register, login, logout) — manual, no starter kit
- Full task CRUD (create, read, update, delete)
- Soft delete with trash and restore
- Task status tracking: pending, in progress, completed
- Dashboard with task count per status
- Form Request validation
- Policy-based authorization (users manage only their own tasks)
- Route Model Binding

## Setup

### Requirements
- Docker

### Steps
```cmd
git clone https://github.com/khadkarewant/test-task-manager.git
cd test-task-manager
copy .env.example .env
docker compose up --build
docker compose exec app chmod -R 777 storage bootstrap/cache
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

Visit `http://localhost:8000`

## Database
See `.env.example` for database configuration.
