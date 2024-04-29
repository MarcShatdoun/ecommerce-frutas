<?php

// parameters for the connection
// Nunca subir este archivo a la nube

$address = "127.0.0.1";
$user = "root";
$password = "";
$database = "ecomerce";

// connection to the database

$link = "mysql:host=$address;port=$3306;dbname=$database";

try{
    $conn = new PDO($link, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, PDO::FETCH_ASSOC);
    echo "Conexion exitosa <br>";


} catch(Exception $e){
    echo "Error: " . $e->getMessage();
}