<?php
session_start();
if (isset($_SESSION['user'])) {
  unset($_SESSION['user']);
  header('Location: /apartmaniAdmin/apartments/apartment1.php');
}
