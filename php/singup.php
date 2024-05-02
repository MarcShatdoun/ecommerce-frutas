<?php


include_once("connection.php");

$data = json_decode(file_get_contents('php://input'), true);

// // echo "<pre>";
// // var_dump($data);
// // echo "</pre>";

$nombre = $data['nombre'];

$apellido = $data['apellido'];

$password_hash = $data['password1'];

$password2 = $data['password2'];

$email = $data['email'];

$nif = $data['nif'];

$telefono = $data['telefono'];

$direccion = $data['direccion'];

$ciudad = $data['ciudad'];


//password encriptado
$password_hash = password_hash($password_hash, PASSWORD_DEFAULT);
// echo strlen($password_hash);

$select = "SELECT * FROM cliente WHERE email = ?";
$query = $conn->prepare($select);
$query->execute([$email]);
$result = $query->fetch();

// comprobar post 
// echo "<pre>";
// var_dump($result);
// echo "</pre>";

if ($result){
    echo "El email ya existe";
    die();
}

//obtener la id de la ciudad
$select = "SELECT id_ciudad FROM ciudades WHERE nombre_ciudad = ?";

$query = $conn->prepare($select);
$query->execute([$ciudad]);
$result = $query->fetch();

// echo "<pre>";
// var_dump($result['id_ciudad']);
// echo "</pre>";


if (!$result) {
    // Insertar la ciudad
    $insert = "INSERT INTO ciudades (nombre_ciudad) VALUES (?)";
    $query = $conn->prepare($insert);
    $query->execute([$ciudad]);

    // Obtener el id de la ciudad
    $select = "SELECT id_ciudad FROM ciudades WHERE nombre_ciudad = ?";
    $query = $conn->prepare($select);
    $query->execute([$ciudad]);
    $result = $query->fetch();

    // echo "<pre>";
    // echo $result['id_ciudad'];
    // echo "</pre>";
}

$id_ciudad = $result['id_ciudad'];

$insert = "INSERT INTO cliente (nombre_cliente, apellido_cliente, password, nif,telefono, id_ciudad, direccion_cliente , email) VALUES (?,?,?,?,?,?,?,?)";
$query = $conn->prepare($insert);
$query->execute([$nombre, $apellido, $password_hash, $nif, $telefono, $id_ciudad, $direccion, $email]);
echo "ok";
$conn = null;
$insert = null;
$select = null;

header("Location: ecommerce.php"); 