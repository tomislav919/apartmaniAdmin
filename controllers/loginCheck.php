<?php

include('../bootstrap.php');

session_start();
if(isset($_SESSION["user"])){
  header("location: /apartmaniAdmin/administration.php");
  exit;
}


$name = $_POST['name'];
$password = $_POST['password'];

$user = User::where('name', $name)->first();


if (isset($user))
{
    // echo 'user je pronađen';
    if($user->password == $password){
     //echo 'password je ok, može login';
      $_SESSION['user'] = $name;
      header('Location: /apartmaniAdmin/administration.php');
    } else {
      //echo 'password je neispravan';
      $_SESSION['message'] = 1;
      header("location: /apartmaniAdmin/login.php");

    }
}
else
{
    //echo 'user nije pronađen';
    $_SESSION['message'] = 1;
    header("location: /apartmaniAdmin/login.php");
}


?>
