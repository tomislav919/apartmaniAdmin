<?php

require "../bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('apartments', function ($table) {
  $table->bigIncrements('id');
  $table->string('name');
  $table->integer('size');
  $table->rememberToken();
  $table->timestamps();
});
