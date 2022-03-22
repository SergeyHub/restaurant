`1. composer install`  
`2. Create db , edit env`  
`3. php artisan key:generate`  
`4. npm install`  
`5. npm run dev`  
`6 php artisan serve`  

## Main stages of development

#### 1. Installation Project Template. Create Database

`composer create-project --prefer-dist  laravel/laravel .`   
`npm install`  
`npm run dev`  

`git init`  
`git add .`  
`git commit –m "Comment"`  
**`git remote add origin https://github.com/SergeyHub/restaurant.git`**  
`git push -u origin master`  

##### 1.1 Postgersql
```
Let's start SQL Shell (psql). The program will prompt you to enter the name    
of the server, database, port and user. You can click/skip these items as they  
will use the default values   
(for server - localhost, for database - postgres, for port - 5432,  
as user - postres superuser). 
Next, you will need to enter a password for the user   
(by default, the postgres user): 123456 (in my case)  
```

![Screenshot](readme/psql.JPG)   

`postgres=# create database db_name;`  
  **database list**  
`select datname from pg_database;`   
pg_dump dbname > outfile 

**`Edit  env. file`**    
```
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=cargo
DB_USERNAME=postgres
DB_PASSWORD=123456
```
##### 1.2 MySQL

`mysql -u root -p`  
`create database crud_api; db_name;`  
`drop database db_name;`   
`show databases;`  
`use db_name;`  
`show tables;`   
`drop table table_name;`  
`exit`  

**`Edit  env. file`**   
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_api
DB_USERNAME=root
DB_PASSWORD=123456
```
##### 1.3 Migration

`php artisan migrate`  

##### 1.4 Version
`npm -v`  
`php -v`
#### 2. Install Laravel Breeze
`composer require laravel/breeze --dev`  
`php artisan breeze:install`  
`npm install`  
`npm run dev`  
**`edit users table`**  
```
 Schema::create('users', function (Blueprint $table) {
    $table->boolean('is_admin')->default(false);
```
`php artisan migrate`   
#### 3. Admin Middleware
`php artisan make:middleware Admin`  
`php artisan make:controller Admin/AdminController`    

**`Kernel.php`**
```
protected $routeMiddleware = [
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    'admin' => Admin::class
];
```
**`Middleware/Admin.php`**
```
if(!auth()->check() || !auth()->user()->is_admin){
    abort(403);
}
```
**`web.php`**
```
Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

});
```
#### 4. Views Admin Index App\View\Components\AdminLayout.php

#### 5. https://www.alpinetoolbox.com/examples/ index.blade admin.blade navigation.blade dashboard.blade
`https://github.com/jan-heise/responsive-navbar-with-dropdown/blob/master/public/sidebar.html`

#### 6. How.md Read.me
#### 7. Category Menu Table Reservation Models & Tables
`php artisan make:model Category -m`   
`php artisan make:model Menu -m`    
`php artisan make:model Table -m`     
`php artisan make:model Reservation -m` 
`php artisan migrate`  
#### 8. Category Menu Table Reservation Models     
#### 9. Category Menu Table Reservation Controllers
```
php artisan make:controller Admin/MenuController --api --resource --model=Menu  

php artisan make:controller Admin/MenuController --resource --model=Menu
php artisan make:controller Admin/CategoryController --resource --model=Category
php artisan make:controller Admin/TableController --resource --model=Table
php artisan make:controller Admin/ReservationController --resource --model=Reservation
```
#### 12. Category Seede Table 
`php artisan make:factory CategoryFactory`  
**`CategoryFactory.php`**  
```
return [
    'name' => $this->faker->text(15),
    'description' => $this->faker->text(25),
    'image' => $this->faker->text(25),
];
```
**`DatabaseSeeder.php`**  
```
Category::factory()->count(5)->create();
```
`php artisan db:seed`  

#### 13. Menu Seede Table 
`npm install -D tailwindcss postcss autoprefixer`  
`php artisan make:factory MenuFactory`  
**`MenuFactory.php`**  
```
return [
    'name' => $this->faker->text(15),
    'description' => $this->faker->text(25),
    'image' => $this->faker->text(25),
    'price' => $this->faker->numberBetween($min = 5, $max = 150)
];
```
**`DatabaseSeeder.php`**  
```
Menu::factory()->count(25)->create();
```
`php artisan db:seed`  
#### 14. Menu View Controller


