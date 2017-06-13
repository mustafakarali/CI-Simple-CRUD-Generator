<?php

$dbname = 'ajaxdb';
$user = 'root';
$pw = '';
$host='localhost';

$db = new PDO("mysql:host=".$host.";dbname=".$dbname,$user,$pw);

?>