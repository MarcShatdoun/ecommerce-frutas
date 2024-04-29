<?php

use LDAP\Result;

include_once("connection.php");

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

$nombre = $_POST['nombre'];

$apellido = $_POST['apellido'];

$password1 = $_POST['password1'];

$password2 = $_POST['password2'];

$email = $_POST['email'];

$nif = $_POST['nif'];

$telefono = $_POST['telefono'];

$direccion = $_POST['direccion'];

$ciudad = $_POST['ciudad'];


//password encriptado
$password1 = password_hash($password1, PASSWORD_DEFAULT);
// echo strlen($password1);

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
$query->execute([$nombre, $apellido, $password1, $nif, $telefono, $id_ciudad, $direccion, $email]);

$conn = null;
$insert = null;
$select = null;

header("Location: ecommerce.php");