<?php
require "../bootstrap.php";
use Illuminate\Database\Capsule\Manager as Capsule;
Capsule::schema()->create('users', function ($table) {
  $table->bigIncrements('id');
  $table->string('name');
  $table->string('email')->unique();
  $table->string('password');
  $table->string('userImage')->nullable();
  $table->string('api_key')->nullable()->unique();
  $table->rememberToken();
  $table->timestamps();
});
