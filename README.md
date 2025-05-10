
# Laravel Artisan Shortcuts

A simple package to create shortcuts for common Artisan commands in Laravel.

## Installation

To install the package, you can use Composer. Run the following command in the root directory of your Laravel project:

```bash
composer require premsoni/laravel-artisan-shortcuts:^1.0
```

## Installation

If the package is not published on Packagist, you can install it using the GitHub VCS method:

### Step 1: Add the repository to your Laravel project's `composer.json`

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/prem-soni/prem-soni-laravel-artisan-shortcuts"
    }
]
## Usage

Once the package is installed, you can use the following shortcut commands:

### 1. **`c`** - Create a Controller

Create a new controller with the following shortcut:

```bash
php artisan ps c ControllerName
```

This will create a new controller named `ControllerNameController`.

### 2. **`m`** - Create a Model with Migration, Controller, and Resource

Create a model along with migration, controller, and resource file:

```bash
php artisan ps m ModelName
```

This will generate a model with the necessary components.

### 3. **`mig`** - Run Migrations

To run the migrations:

```bash
php artisan ps mig
```

This will execute all pending migrations.

### 4. **`seed`** - Run Seeders

To run all seeders:

```bash
php artisan ps sd
```

This will execute all the seeders for your database.

### 5. **`rlist`** - List All Routes

To list all the routes defined in the application:

```bash
php artisan ps rlist
```

This will show all available routes.

### 6. **`s`** - Serve the Application

To start the Laravel development server:

```bash
php artisan ps s
```

This will run `php artisan serve`.

### 7. **`migrate:refresh`** - Refresh the Database

To refresh the database by rolling back all migrations and re-running them:

```bash
php artisan ps mip
```

This will execute `php artisan migrate:refresh`.

## Contributing

If you would like to contribute to this package, feel free to fork the repository, make changes, and submit a pull request. 

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
