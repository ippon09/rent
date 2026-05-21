
<?php
$driver="mysql";
$host="localhost";
$db_name="monumentdb";
$charset="utf8";
$user="root";
$password="mysql";
$options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];


try{
    $pdo=new PDO("$driver:host=$host;dbname=$db_name;charset=$charset",$user,$password,$options);
    echo "Успешное подключение к БД";
}catch(PDOException $e){
    echo "ОШИБКА ПОДКЛЮБЧЕНИЯ К БД " . $e->getMessage();
}


?>