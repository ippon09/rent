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

//запрос на полчуние днных с одной таблицы
function selectAll($table, $params=[])
{
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        echo tt($params);
        $i=0;
        foreach($params as $key=>$value){
            if(!is_numeric($value)){
                $value="'" . $value ."'";
            }
             if($i===0){
                $sql=$sql . " WHERE $key=$value";
             }else{
                $sql=$sql . " AND $key=$value";
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


//запрос 6на поулчение однорй строки с выбранной таблицы

function selectOne($table, $params=[]){
    global $pdo;
    $sql="SELECT * FROM $table";
    
    if(!empty ($params)){
        $i=0;
        foreach($params as $key=>$value){
            if(!is_numeric($value)){
                $value="'" . $value . "'";
            }
            if($i===0){
                $sql=$sql ." WHERE $key=$value"; 
            }else{
                $sql=$sql ." AND $key=$value";
            }
            $i++;
        }
    }
    $sql=$sql . " LIMIT 1";

    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();



}


$params=[
    // 'person_number'=>'на двоих',
    // 'size'=>'маленький',
    'monument_type'=>'заливнойй',
];

// tt(selectAll('monuments', $params));
tt(selectOne('monuments'));
 