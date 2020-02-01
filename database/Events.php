<?php
require "../bootstrap.php";
use Illuminate\Database\Capsule\Manager as Capsule;
Capsule::schema()->create('events', function ($table) {
  $table->bigIncrements('id');
  $table->unsignedBigInteger('calendar_id');
  $table->foreign('calendar_id')->references('id')->on('calendars');
  $table->unsignedBigInteger('apartment_id');
  $table->foreign('apartment_id')->references('id')->on('apartments');
  $table->string('title');
  $table->string('comment')->nullable();
  $table->string('start');
  $table->string('end');
  $table->string('allDay');
  $table->string('backgroundColor');
  $table->string('borderColor');
  $table->rememberToken();
  $table->timestamps();
});
