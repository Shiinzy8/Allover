<?php

//INSERT INTO `data` (`ident`, `value`, `version`) VALUES

//('first', 'some 1 value', 1),
//('second', 'some 2 value', 1),
//('ident3', 'some 3 value', 1),
//('ident4', 'some 4 value', 1),
//('ident5', 'some 5 value', 1),
//('6', 'some 6 value', 1),
//('ident7', 'some 7 value', 1);


// data for tests

// ident[1]=first&value[1]=some first text&version[1]=1&ident[2]=6&value[2]=some text for second &version[2]=1&ident[3]=2&value[3]=some text for second &version[3]=3&ident[4]=9&value[4]=ninth text&version[4]=5&
// ident[1]=first&value[1]=some first text&version[1]=6&ident[2]=20&value[2]=some 20 text&version[2]=5
// ident[1]=1&value[1]=some test text&version[1]=6&ident[2]=2&value[2]=some new text&version[2]=5
// ident[1]=first&value[1]=some%20test%20text&version[1]=3&ident[2]=7&value[2]=some%20new%20text&version[2]=1
// ident[1]=first&value[1]=some%20test%20text&version[1]=1&ident[2]=7&value[2]=some%20new%20text&version[2]=1

if(!empty($_GET)) {
    echo "<pre>";
    print_r(DBaction($_GET));
    echo "</pre>";
}

function DBaction ($data) {

    //transform data from $_GET
    $data_row=[];
    foreach($data['ident'] as $key=>$value) {
        $data_row[$value] = ['value'=>$data['value'][$key],'version'=>(int)$data['version'][$key]];
    }

    //connection with mysql
    $conn = new mysqli("localhost","root","","uniweb_test");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully"."<br/>";

    $query = "SELECT * FROM uniweb_test.data";
    $arr_db = $conn->query($query);

    //transform data from mysql
    $arr_db_row = [];
    while($row = mysqli_fetch_array($arr_db)) {
        $arr_db_row[$row['ident']] = ['value'=>$row['value'],'version'=>(int)$row['version']];
    }

    //return array
    $finish_arr = [
        'delete'=>[],
        'update'=>[],
        'new'=>[],
    ];

    foreach ($data_row as $key=>$value) {
        if (array_key_exists($key,$arr_db_row)) {
            //2. update - список значений и версий по идентификаторам, где версия в БД стала больше чем версия пришедшая в запросе
            if ($value['version'] < $arr_db_row[$key]['version']) {
                $finish_arr['update'][$key] = ['value'=>$value['value'],'version'=>$value['version']];
            }
        } else {
            //1. delete - список идентификаторов, которые пришли в запросе и отсутствуют в БД
            $finish_arr['delete'][] = $key;
        }
    }

    foreach($arr_db_row as $key=>$value) {
        if (!array_key_exists($key,$data_row)) {
            //3. new - список значений и версий по идентификаторам, которые отсутствуют в пришедшем запросе, но есть в БД
            $finish_arr['new'][$key] = ['value'=>$value['value'],'version'=>$value['version']];
        }
    }

    return $finish_arr;
}



