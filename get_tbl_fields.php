<?php

require_once 'db.php';


$sql = $db->query("SHOW COLUMNS FROM ".$_GET['table_sel'])->fetchAll(PDO::FETCH_ASSOC);


echo json_encode(array('cols'=>$sql));