<?php
    session_start();
    include "../clases/Conexion.php";
    include "../clases/Crud.php";

    // Se crea una instancia de la clase Crud
    $crud = new Crud();

    // Se obtiene el ID del documento a modificar
    $id = $_POST['id'];

    // Se crea un array con los nuevos datos enviados desde el formulario
    $datos = array(
        // CAMBIO: Se usan los nombres de campo de la colección 'mascotas'
        "nombre_mascota" => $_POST['nombre_mascota'],
        "edad"             => (int)$_POST['edad'], // Es buena práctica convertir la edad a número
        "especie"          => $_POST['especie'],
        "raza"             => $_POST['raza'],
        "nombre_dueno"     => $_POST['nombre_dueno']
    );

    // Se llama al método 'actualizar' de la clase Crud
    $respuesta = $crud->actualizar($id, $datos);

    // Se comprueba si la operación fue exitosa
    if ($respuesta->getModifiedCount() > 0 || $respuesta->getMatchedCount() > 0) {
        // Si se modificó o si coincidió el documento (aunque no se cambiara nada)
        $_SESSION['mensaje_crud'] = 'update';
        header("location:../index.php");
    } else {
        // Si hubo un error, se muestra la respuesta para depuración
        print_r($respuesta);
    }
?>