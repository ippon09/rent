<?php
 require_once 'setting.php';

 $connection = new mySqli($host, $user, $pass, $data);
 if($connection->connect_error) die('connetction faelied');


//запрос бд
$query="SELECT * FROM monuments";
$result=$connection->query($query);

if(!$result) die ('query failed');

echo '<pre>';
print_r($result);
echo '</pre>';


$rows=$result->num_rows;
for ($i=0; $i<$rows; ++$i){
    $result->data_seek($i); 
    $row=$result->fetch_assoc();

    echo "type " . $row['monument_type'] . '<br>';
    
    
    echo "data of row:" .print_r($row) . '<br>';
}
$result->close();
$connection->close();

?>