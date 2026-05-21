
<?php
$driver="mysql";
$host="localhost";
$db_name="monumentdb";
$charset="utf8";
$user="root";
$password="mysql";

try{
    $pdo=new PDO("$driver:host=$host;dbname=$db_name;charset=$charset",$user,$password);
    echo "Успешное подключение к БД";
}catch(PDOException $e){
    echo "ОШИБКА ПОДКЛЮБЧЕНИЯ К БД " . $e->getMessage();
}


?>