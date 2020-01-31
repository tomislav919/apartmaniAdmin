<?php
require "bootstrap.php";
Apartment::Create(['name' => "Apartment 1", "size" => 3]);
$user = User::Create([    'name' => "AdministratorUser",    'email' => "test@besoft.hr",    'password' => password_hash("12345678",PASSWORD_BCRYPT), ]);
print_r($user->Calendar()->create([
  'name' => "Rezervacija Josip",
  'apartment_id' => 1
]));
