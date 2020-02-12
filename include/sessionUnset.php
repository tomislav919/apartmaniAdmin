<?php
session_start();
if (isset($_SESSION['user'])) {
  session_unset();
  header('Location: /apartmaniAdmin/apartments/apartment1.php');
}
