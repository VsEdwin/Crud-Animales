<?php
    include "./clases/Conexion.php";
    include "./clases/Crud.php";
    include "./header.php"; 

    $crud = new Crud();
    $id = $_POST['id'];
    $datos = $crud->obtenerDocumento($id);
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4 shadow-lg">
                <div class="card-body">

                    <a href="index.php" class="btn btn-outline-info mb-3">
                        <i class="fa-solid fa-angles-left"></i> Regresar
                    </a>

                    <h2 class="text-center">🐾 Eliminar Mascota 🐾</h2>
                    
                    <table class="table table-bordered text-center align-middle mt-4">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre Mascota</th>
                                <th>Edad</th>
                                <th>Especie</th>
                                <th>Raza</th>
                                <th>Nombre del Dueño</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $datos->nombre_mascota; ?></td>
                                <td><?php echo $datos->edad; ?></td>
                                <td><?php echo $datos->especie; ?></td>
                                <td><?php echo $datos->raza; ?></td>
                                <td><?php echo $datos->nombre_dueno; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <hr>

                    <div class="alert alert-danger mt-3" role="alert">
                        <h4 class="alert-heading">¡Atención! 🚨</h4>
                        <p>¿Estás seguro de que quieres eliminar a esta mascota?</p>
                        <hr>
                        <p class="mb-0">
                            Una vez eliminada, la información no podrá ser recuperada.
                        </p>
                    </div>

                    <form action="./procesos/eliminar.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $datos->_id; ?>">
                        <button class="btn btn-danger w-100">
                            <i class="fa-solid fa-trash"></i> Sí, eliminar mascota
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./scripts.php"; ?>