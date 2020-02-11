<?php

include('../bootstrap.php');

var_dump($_POST);

$name = $_POST['name'];
$password = $_POST['password'];

$user = User::where('name', $name)->first();


if (isset($user))
{
    echo 'user je pronađen';
    if($user->password == $password){
      echo 'password je ok, može login';
    } else {
      echo 'password je neispravan';
    }
} else {
    echo 'user nije pronađen';
}


?>
