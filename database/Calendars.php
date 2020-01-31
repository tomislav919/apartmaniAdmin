<?php
require "../bootstrap.php";
use Illuminate\Database\Capsule\Manager as Capsule;
Capsule::schema()->create('calendars', function ($table) {
  $table->bigIncrements('id');
  $table->string('name')->unique();
  $table->rememberToken();
  $table->timestamps();
});
