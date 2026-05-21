<?php
require_once 'connect.php';

function tt($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();

    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}
function selectAll($table, $params=[])
{
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        echo tt($params);
        $i=0;
        foreach($params as $key=>$value){
             if($i===0){
                $sql=$sql . " WHERE $key=>$value";
             }else{
                $sql=$sql . " AND $key=>$value";
             }
             $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);


    $data = $query->fetchALL();
    return $data;
}
$params=[
    'preson_number'=>'нав четверых',
    'size'=>'большой'
];

tt(selectAll('monuments', $params));
 