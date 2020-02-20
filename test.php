<?php
echo $_SERVER['SCRIPT_NAME'] . "<br/>";
echo $_SERVER['REQUEST_URI'] . "<br/>";
echo $_SERVER['PHP_SELF'] . "<br/>";
echo $_SERVER['DOCUMENT_ROOT'] . "<br/>";
echo getcwd() . "<br/>";
echo dirname(__FILE__) . "<br/>";
echo __DIR__ . "<br/>";

?>
