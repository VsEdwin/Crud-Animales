<?php 
    // No es necesario incluir la conexión aquí si ya la incluyes en los archivos
    // que usan esta clase, pero no hace daño tenerla por si acaso.
    require_once "Conexion.php";

    class Crud {
        // Muestra todas las mascotas
        public function mostrarDatos() {
            try {
                $conexion = Conexion::conectar();
                // CAMBIO: De 'personas' a 'mascotas'
                $coleccion = $conexion->mascotas; 
                $datos = $coleccion->find();
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        // Obtiene los datos de una sola mascota por su ID
        public function obtenerDocumento($id) {
            try {
                $conexion = Conexion::conectar();
                // CAMBIO: De 'personas' a 'mascotas'
                $coleccion = $conexion->mascotas;
                $datos = $coleccion->findOne(
                    array(
                        '_id' => new MongoDB\BSON\ObjectId($id)
                    )
                );
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        // Inserta una nueva mascota en la base de datos
        public function insertarDatos($datos) {
            try {
                $conexion = Conexion::conectar();
                // CAMBIO: De 'personas' a 'mascotas'
                $coleccion = $conexion->mascotas;
                $respuesta = $coleccion->insertOne($datos);
                return $respuesta;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        // Elimina una mascota de la base de datos
        public function eliminar($id) {
            try {
                $conexion = Conexion::conectar();
                // CAMBIO: De 'personas' a 'mascotas'
                $coleccion = $conexion->mascotas;
                $respuesta = $coleccion->deleteOne(
                    array(
                        "_id" => new MongoDB\BSON\ObjectId($id)
                    )
                );
                return $respuesta;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        // Actualiza los datos de una mascota
        public function actualizar($id, $datos) {
            try {
                $conexion = Conexion::conectar();
                // CAMBIO: De 'personas' a 'mascotas'
                $coleccion = $conexion->mascotas;
                $respuesta = $coleccion->updateOne(
                    ['_id' => new MongoDB\BSON\ObjectId($id)],
                    ['$set' => $datos]
                );
                return $respuesta;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        // (Opcional) Mensajes de alerta personalizados
        public function mensajesCrud($mensaje) {
            $msg = '';

            if ($mensaje == 'insert') {
                $msg = 'swal("¡Éxito!", "Mascota agregada correctamente 🐾", "success")';
            } else if ($mensaje == 'update') {
                $msg = 'swal("¡Éxito!", "Datos de la mascota actualizados 📝", "info")';
            } else if ($mensaje == 'delete') {
                $msg = 'swal("¡Hecho!", "Mascota eliminada de la lista 👋", "warning")';
            }

            return $msg;
        }
    }

?>