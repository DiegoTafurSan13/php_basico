<?php
try {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    $pdo = new PDO(
        'mysql:host=127.0.0.1;dbname=deck',
        'root',
        ''
    );
    $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR

    $params = json_decode($json); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
    
    $nombreArchivo = $params->nombreArchivo;
    $description = $params->description;
    $quality = $params->quality;
    $objetives = $params->objetives;
    $attack_speed = $params->attack_speed;
    $affected_target = $params->affected_target;
    $scope = $params->scope;
    $speed = $params->speed;
    $letter_level = $params->letter_level;
    $life_points = $params->life_points;
    $damage = $params->damage;
    $damage_for_seconds = $params->damage_for_seconds;

    $archivo = $params->base64textString;
    $archivo = base64_decode($archivo);
    

    
    $filePath = $_SERVER['DOCUMENT_ROOT']."main/ServerImage/".$nombreArchivo;
    file_put_contents($filePath, $archivo);

    $sql='insert into onedeck(name,description,quality,objetives,attack_speed,affected_target,scope,speed,letter_level,life_points,damage,damage_for_seconds) 
    values(:name,:description,:quality,:objetives,:attack_speed,:affected_target,:scope,:speed,:letter_level,:life_points,:damage,:damage_for_seconds)';
    $ps=$pdo->prepare($sql);
    $ps->bindParam(':name',$nombreArchivo);
    $ps->bindParam(':description',$description);
    $ps->bindParam(':quality',$quality);
    $ps->bindParam(':objetives',$objetives);
    $ps->bindParam(':attack_speed',$attack_speed);
    $ps->bindParam(':affected_target',$affected_target);
    $ps->bindParam(':scope',$scope);
    $ps->bindParam(':speed',$speed);
    $ps->bindParam(':letter_level',$letter_level);
    $ps->bindParam(':life_points',$life_points);
    $ps->bindParam(':damage',$damage);
    $ps->bindParam(':damage_for_seconds',$damage_for_seconds);
    
    $resultado=$ps->execute();
    
    class Result{}
        // GENERA LOS DATOS DE RESPUESTA
        $response = new Result();
        
        $response->resultado = 'OK';
        $response->mensaje = 'SE SUBIO EXITOSAMENTE';
        
        header('Content-Type: application/json');
        echo json_encode($response); // MUESTRA EL JSON GENERADO */
} catch (PDOException $e) {
    echo 'error' . $e->getMessage();
}finally{
    $pdo = null;
}

/*$sql='select * from usuarios';
$resultado= $pdo->query($sql);


foreach ($resultado as $fila) {
    echo "{$fila['id']} {$fila['name']} {$fila['last_name']} {$fila['email']}";
}**/
