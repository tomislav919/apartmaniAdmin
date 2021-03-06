<?php
require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
  "driver" => "mysql",
  "host" => "127.0.0.1",
  "database" => "calendar",
  "username" => "root",
  "password" => "",
  'charset'   => 'utf8',
  'collation' => 'utf8_unicode_ci'
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
define('PATH', dirname(__FILE__));
define('ROOTPATH', 'http://localhost/apartmaniAdmin');


/*
 * GET STARTED WITH THE APPLICATION:

1. Create a MySQL migrations and use the calendar.sql file to import the tables. Or you can use the migrations in the migrations folder to create the tables manualy.
2. Create bootstrap.php file in the root of your project (example: apartmaniAdmin/bootstrap.php)
3. Copy everything from bootstrap.example.php to bootstrap.php and fill in the database name, username and password
4. Define your ROOTPATH in bootstrap.php -> define('ROOTPATH', '');
5. Composer update/composer install
6. Open localhost/yourProject
7. Login info user: Administrator ; pass: 12345678
*/
