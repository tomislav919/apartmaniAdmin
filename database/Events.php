<?php
require "../bootstrap.php";
use Illuminate\Database\Capsule\Manager as Capsule;
Capsule::schema()->create('events', function ($table) {
  $table->bigIncrements('id');
  $table->unsignedBigInteger('calendar_id');
  $table->foreign('calendar_id')->references('id')->on('calendars');
  $table->unsignedBigInteger('apartment_id');
  $table->foreign('apartment_id')->references('id')->on('apartments');
  $table->string('name');
  $table->string('comment');
  $table->date('startDate');
  $table->date('endDate');
  $table->rememberToken();
  $table->timestamps();
});
