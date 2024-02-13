# GodesQ PMS (Laravel) Installation Guide

This guide provides step-by-step instructions for installing GodesQ PMS (Property Management System) using Laravel.

### 1st Step:
Clone the repository from GitHub:
```
git clone https://github.com/GodesQ/godesq-pms.git
```

### 2nd Step:
Ensure Composer is installed. If not, download and install it. Once installed, navigate to the `godesq-pms` directory in your terminal.

### 3rd Step:
Run the following command to update Composer and install necessary packages:
```
composer update
```

### 4th Step:
After installing the vendor directory, create a `.env` file by copying the example file:
```
cp .env.example .env
```

### 5th Step:
Setup a database using WAMP or XAMPP with the name `godesq_pms_db`. Do not create any tables as Laravel will handle migration.

### 6th Step:
In the `.env` file, update the `DB_DATABASE` value to `godesq_pms_db`.

### 7th Step:
Once all tools and packages are installed, migrate the tables by running:
```
php artisan migrate:fresh --seed --seeder=DatabaseSeeder
```

### 8th Step:
After migration, ensure the application is running by executing:
```
php artisan serve
```

### Super Admin Account:
Use the following credentials to access the super admin account:
- **Email:** superadmin@gmail.com
- **Password:** password

Now you should be able to access and use GodesQ PMS in your browser.
