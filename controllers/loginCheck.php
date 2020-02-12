<?php

include('../bootstrap.php');

session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: administration.php");
  exit;
}
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
