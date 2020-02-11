<?php

require "../bootstrap.php";
$events = Event::select('title', 'start', 'end', 'backgroundColor', 'borderColor')->get();

$events = str_replace('"', '', $events);



?>
