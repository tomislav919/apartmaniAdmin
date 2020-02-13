<?php
require "../bootstrap.php";



Event::where('id', '=', $_POST['id'])
  ->update
  ([
    'start' => $_POST['start'],
    'end' => $_POST['end'],
  ]);


?>
