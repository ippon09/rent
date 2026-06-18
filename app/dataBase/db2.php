<?php
require_once('connect.php');


$params = [
    'monument_type' => 'гранит',
    'size' => 'маленький'
];


function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
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

function selectAll($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key =$value";
            } else {
                $sql = $sql . " AND $key =$value";
            }
            $i++;
        }
    }


    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);

    return $query->fetchAll();
}

function selectOne($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key =$value";
            } else {
                $sql = $sql . " AND $key =$value";
            }
            $i++;
        }
    }

    $sql = $sql . " LIMIT 1";



    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);

    return $query->fetch();
}




// tt(selectAll('monuments', $params));
tt(selectOne('monuments'));

    $arrData=[
        'sz'=>'кастом',
        'mt'=>'гранит',
        'pn'=>'на четверых'
    ];

function insert($table, $params){
    global $pdo;
    
    $i=0;
    $column='';
    $mask='';
    foreach ($params as $key=>$value){
        #column=$column . $key;
        $mask=$mask . $value;          
        $i++;
    }

    $sql = "INSERT INTO $table ($column) VALUES ($mask)";

    tt($sql);
    exit();

    $query=$pdo->prepare($sql);
    $query->execute($arrData);
    dbCheckError($query);
}
insert('monuments',$arrData);



//INSERT INTO monuments( size, monument_type, person_number) VALUES ('[value-2]','[value-3]','[value-4]')






