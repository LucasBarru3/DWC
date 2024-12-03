<?php

/* Al momento de enviar los datos en formato Json mediante fetch debes de tratarlos como un string enviado por el body
 y no como un array en la varible $_POST

Para eso es esta lineal de código $_POST =json_decode(file_get_contents('php://input'),true)
la variable se puede lloamar $_POST, o como sea
 */

$_POST = json_decode(file_get_contents('php://input'), true);

$usuario = $_POST['usuario'];
$pass = $_POST['pass']; 

if($_POST['usuario'] === '' || $_POST['pass']=== ''){
    echo json_encode('error');
}else{
    echo json_encode('Correcto: <br>Usuario:'.$usuario.'<br>Pass:'.$pass);
}

