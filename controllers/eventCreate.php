<?php
require "../bootstrap.php";


Event::Create([
    'title' => $_POST['title'],
    'start' => $_POST['start'],
    'end' => null,
    'backgroundColor' => $_POST['backgroundColor'],
    'borderColor' => $_POST['borderColor'],
    'calendar_id' => 1,
    'apartment_id' => $_POST['apartmentId'],
    'allDay' => null
]);


//Calendar::Create(['name' => $test]);

/*
$user = User::Create([    'name' => "AdministratorUser",    'email' => "test@besoft.hr",    'password' => password_hash("12345678",PASSWORD_BCRYPT), ]);
print_r($user->Calendar()->create([
  'name' => "Rezervacija Josip",
  'apartment_id' => 1
]));

*/
