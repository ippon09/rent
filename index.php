<?php
 require_once 'setting.php';

 $connection = new mySqli($host, $user, $pass, $data);
 if($connection->connect_error) die('connetction faelied');
?>