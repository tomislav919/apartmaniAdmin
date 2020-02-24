<?php

require "../../bootstrap.php";
require_once '../eventController.php';

$methodName = $_POST['methodName'];

if (isset($_POST['methodName'])) {
  $newEvent = new eventController();
  $result = $newEvent->$methodName($_POST);
  echo json_encode($result);
}

