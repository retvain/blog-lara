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

### create Observers

sail php artisan make:observer BlogPostObserver --model=BlogPost

sail php artisan make:observer BlogCategoryObserver --model=BlogCategory

### Create migration file for the table

sail php artisan queue:table

### Create migration file failed_jobs

sail php artisan queue:failed-table

### Create first test Jobs

sail php artisan make:job BlogPostAfterCreateJob

sail php artisan make:job BlogPostAfterDeleteJob

sail php artisan make:job ProcessVideoJob

sail artisan queue:work
//run task processing chosen queue as demon

sail artisan queue:work --queue=queueName1,queueName2
//first exec name1, after Name2

sail artisan queue:listen
//run job processing chosen queue

sail artisan queue:restart
//soft reset demon queue:work, after he completes the job

sail artisan queue:retry all
//returns all failed job to the queue

sail artisan queue:retry 5
//View failed job id=5 in queue to run

sail artisan queue:failed
//see failed tasks

### create the symbolic link
sail artisan storage:link
