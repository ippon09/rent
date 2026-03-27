<?php
//запрос к бд при помощи PHP (pdo)
$connection=new PDO("mysql:host=localhost;dbname=monumentdb","root","mysql");

//запись данных-прямой запрос к бд
// $query="INSERT INTO monuments(size, monument_type, person_number) VALUES('средний','заливной','на троих')";

//вывод даннх одной строки
// $query="SELECT * FROM monuments WHERE id__monument=17";
// $stm=$connection->query($query);

// $row=$stm->fetch(PDO::FETCH_ASSOC);

// echo "ID: " . $row['id__monument'] . '<br>';
// echo "size: " .$row['size'] . '<br>';
// echo "type: " .$row["monument_type"];

$type='заливнойй';
$size='большой';
$person_number='на четверых';

$sql="INSERT INTO monuments(size,monument_type,person_number) VALUES (:t,:size,:person_number)";
$query=$connection->prepare($sql);//подготавливаем запрос

$query->execute(['t'=>$type,'size'=>$size,'person_number'=>$person_number]);

// $count=$connection->exec($query);
// echo "кол-во добавленных строк: $count <br>";
?>