<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Version
This project using MySQL v15.1 PHP v8.1.6 and Laravel v9.27.0

## How to run this project
- Clone this project
```bash
git clone https://github.com/Danyihza/vehicle-booking-apps.git
```
- Install all package
```bash
composer install
```
```bash
npm install
```
- Configuration ```.env``` file with your database Authentication
- Migrate all tables and seed
```bash
php artisan migrate:fresh --seed
```

## User Account
|Username|Password|Role|
|---|---|---|
|admin|admin|Administrator   |
|johndoe01!|123123123|Atasan yang menyutujui|

## Log Viewer
You can see log apps in ``` /log-viewer ``` and select the file