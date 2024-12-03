<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Conexión fallida: ' . $conn->connect_error]));
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['codigo']) || !isset($data['cantidad'])) {
    die(json_encode(['error' => 'Datos incompletos']));
}

$codigo = $data['codigo'];
$cantidad = $data['cantidad'];

$sql = "UPDATE productos SET cantidad = cantidad + ? WHERE codigo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $cantidad, $codigo);

if ($stmt->execute()) {
    echo json_encode(['success' => 'Cantidad actualizada correctamente']);
} else {
    echo json_encode(['error' => 'Error al actualizar la cantidad']);
}

$stmt->close();
?>
