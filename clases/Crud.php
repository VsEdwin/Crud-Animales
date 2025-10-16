<?php 
    require_once "Conexion.php";

    class Crud {
        
        public function mostrarDatos() {
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->mascotas; 
                $datos = $coleccion->find();
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function obtenerDocumento($id) {
            try {
                $conexion = Conexion::conectar();
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
        public function insertarDatos($datos) {
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->mascotas;
                $respuesta = $coleccion->insertOne($datos);
                return $respuesta;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
        public function eliminar($id) {
            try {
                $conexion = Conexion::conectar();
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

        public function actualizar($id, $datos) {
            try {
                $conexion = Conexion::conectar();
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