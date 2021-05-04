# My reminder

### Creat databse

create schema 'app_lara' default character set 'utf8mb4' collate utf8mb4_unicode_ci;

### create model and migrations

sail php artisan make:model Models/BlogCategory -m

sail php artisan make:model models/BlogPost -m

### create seeds

sail php artisan make:seeder UserTablesSeeder

sail php artisan make:seeder BlogCategoriesTableSeeder

### run seeds

sail php artisan db:seed

sail php artisan db:seed --class=UserTableSeeder

sail php artisan migrate:refresh --seed

### create base controllers

sail php artisan make:controller RestTestController --resource

sail php artisan make:controller Blog/BaseController

sail php artisan make:controller Blog/PostController --resource

## Authentication + Laravel/ui

composer require laravel/ui

sail npm install && sail npm run dev

for mix - sail npm install resolve-url-loader@^3.1.2 --save-dev --legacy-peer-deps

### create Admin/CategoryController

sail php artisan make:controller Blog/Admin/CategoryController --resource

### create Request

sail php artisan make:request BlogCategoryUpdateRequest

sail php artisan make:request BlogCategoryCreateRequest

### create PostController

sail php artisan make:controller Blog/Admin/PostController -r

