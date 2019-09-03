<?php
try {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    $PDO=new PDO(
        'mysql:host=127.0.0.1;dbname=deck',
        'root',
        ''
    );
    $filePath ="http://clash.local/main/ServerImage/";
    $sql='select name from onedeck';
    $result=$PDO->query($sql);
    $array=[];
    foreach ($result as $key => $value) {
        $array[$key] = "{$filePath}{$value['name']}";
    }
    /*print_r($array);*/
    header('Content-Type: application/json');
    echo json_encode($array);
    
} catch (Exception $e) {
    echo 'aqui' . $e->getMessage();
}finally{
    $PDO=null;
}
