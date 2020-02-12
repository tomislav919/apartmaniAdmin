<?php
require "../bootstrap.php";
Calendar::Create(['name' => "Apartment 2"]);

$test = $_POST['start'];

Calendar::Create(['name' => $test]);

/*
$user = User::Create([    'name' => "AdministratorUser",    'email' => "test@besoft.hr",    'password' => password_hash("12345678",PASSWORD_BCRYPT), ]);
print_r($user->Calendar()->create([
  'name' => "Rezervacija Josip",
  'apartment_id' => 1
]));

*/
