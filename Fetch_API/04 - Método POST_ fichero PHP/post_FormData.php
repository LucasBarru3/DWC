<?php
//Si recibimos las datos desde un FormData
/*Los objetos FormData le permiten compilar un conjunto de pares clave/valor para enviar mediante XMLHttpRequest.
Están destinados principalmente para el envío de los datos del formulario,
pero se pueden utilizar de forma independiente con el fin de transmitir los datos tecleados.
Los datos transmitidos estarán en el mismo formato que usa el método submit() del formulario para enviar los datos
https://developer.mozilla.org/es/docs/Web/API/FormData/Using_FormData_Objects
*/

$usuario = $_POST['usuario'];
$pass = $_POST['pass']; 

if($_POST['usuario'] === '' || $_POST['pass']=== ''){
    echo json_encode('error');
}else{
    echo json_encode('Correcto: <br>Usuario:'.$usuario.'<br>Pass:'.$pass);
}

