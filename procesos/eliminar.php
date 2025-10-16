<?php
    session_start();
    include "../clases/Conexion.php";
    include "../clases/Crud.php";
    
    // Se crea una instancia de la clase Crud
    $crud = new Crud();

    // Se obtiene el ID del documento a eliminar
    $id = $_POST['id'];

    // Se llama al método 'eliminar' de la clase Crud
    $respuesta = $crud->eliminar($id);

    // Si el conteo de eliminados es mayor a 0, la operación fue exitosa
    if ($respuesta->getDeletedCount() > 0) {
        // Se guarda un mensaje en la sesión para mostrar una alerta
        $_SESSION['mensaje_crud'] = 'delete';
        // Se redirige al usuario a la página principal
        header("location:../index.php");
    } else {
        // Si hay un error, se imprime la respuesta para depurar
        print_r($respuesta);
    }
?>