<?php
require '../bootstrap.php';
session_start();
if (isset($_SESSION['user'])) {
  unset($_SESSION['user']);
  header('Location: ' . ROOTPATH . '/apartments/apartment1.php');
}
