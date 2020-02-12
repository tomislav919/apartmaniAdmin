<?php

session_start();
if (isset($_SESSION['message'])) {
  echo '<script>alert("Username or password is incorrect!");</script>';
  session_unset();
}
