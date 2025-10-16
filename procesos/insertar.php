<?php
    session_start();
    include "../clases/Crud.php";
    
    $crud = new Crud();

    // Recolectas los datos del formulario en un array
    $datos = [
        "nombre_mascota" => $_POST['nombre_mascota'],
        "edad" => (int)$_POST['edad'],
        "especie" => $_POST['especie'],
        "raza" => $_POST['raza'],
        "nombre_dueno" => $_POST['nombre_dueno']
    ];

    // Llamas al método de la clase Crud
    $respuesta = $crud->insertarDatos($datos);

    if ($respuesta->getInsertedId() > 0) {
        $_SESSION['mensaje_crud'] = 'insert';
        header("location:../index.php");
    } else {
        print_r($respuesta);
    }
?>