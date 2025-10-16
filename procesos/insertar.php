<?php
session_start();
include "../clases/Crud.php";
$crud = new Crud();

$datos = [
    "nombre_mascota" => $_POST['nombre_mascota'],
    "edad" => trim($_POST['edad']),
    "especie" => $_POST['especie'],
    "raza" => $_POST['raza'],
    "nombre_dueno" => $_POST['nombre_dueno']
];

$respuesta = $crud->insertarDatos($datos);

if ($respuesta->getInsertedId() > 0) {
    $_SESSION['mensaje_crud'] = 'insert';
    header("Location: ../index.php");
    exit;
} else {
    echo "<pre>Error al insertar registro:</pre>";
    print_r($respuesta);
}
?>