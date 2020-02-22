<?php
require "../bootstrap.php";



Event::where('id', '=', $_POST['id'])
  ->update
  ([
    'title' => $_POST['title'],
    'start' => $_POST['start'],
    'end' => $_POST['end'],
  ]);


?>
