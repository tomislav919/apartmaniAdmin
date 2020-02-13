<?php
require "../bootstrap.php";


Event::where('id', '=', $_POST['id'])->delete();

