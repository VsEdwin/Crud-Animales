
<?php 
	include "./clases/Conexion.php";
	include "./clases/Crud.php";

	$crud = new Crud();
	$id = $_POST['id'];
	$datos = $crud->obtenerDocumento($id);
	$idMongo = $datos->_id;
?>


<?php include "./header.php"; ?>

<div class="container">
	<div class="row">
		<div class="col">
			<div class="card mt-4 shadow">
				<div class="card-body">

					<a href="index.php" class="btn btn-outline-info mb-3">
						<i class="fa-solid fa-angles-left"></i> Regresar
					</a>

					<h2 class="text-center mb-4">Actualizar datos de la mascota 🐾</h2>

					<form action="./procesos/actualizar.php" method="POST">
						
						<input type="hidden" value="<?php echo $idMongo; ?>" name="id">

						<label for="nombre_mascota" class="form-label">Nombre de la mascota</label>
						<input 
							type="text" 
							class="form-control" 
							id="nombre_mascota" 
							name="nombre_mascota" 
							value="<?php echo htmlspecialchars($datos->nombre_mascota); ?>" 
							required>

						<label for="edad" class="form-label mt-2">Edad</label>
						<input 
							type="number" 
							class="form-control" 
							id="edad" 
							name="edad" 
							min="0" 
							value="<?php echo htmlspecialchars($datos->edad); ?>" 
							required>

						<label for="especie" class="form-label mt-2">Especie</label>
						<select class="form-select" id="especie" name="especie" required>
							<option value="">Selecciona una especie</option>
							<option value="Perro" <?php if ($datos->especie == 'Perro') echo 'selected'; ?>>Perro 🐶</option>
							<option value="Gato" <?php if ($datos->especie == 'Gato') echo 'selected'; ?>>Gato 🐱</option>
							<option value="Ave" <?php if ($datos->especie == 'Ave') echo 'selected'; ?>>Ave 🐦</option>
							<option value="Otro" <?php if ($datos->especie == 'Otro') echo 'selected'; ?>>Otro 🦎</option>
						</select>

						<label for="raza" class="form-label mt-2">Raza</label>
						<input 
							type="text" 
							class="form-control" 
							id="raza" 
							name="raza" 
							value="<?php echo htmlspecialchars($datos->raza); ?>">

						<label for="nombre_dueno" class="form-label mt-2">Nombre del dueño</label>
						<input 
							type="text" 
							class="form-control" 
							id="nombre_dueno" 
							name="nombre_dueno" 
							value="<?php echo htmlspecialchars($datos->nombre_dueno); ?>" 
							required>

						<button class="btn btn-warning mt-4 w-100">
							<i class="fa-solid fa-floppy-disk"></i> Actualizar Mascota
						</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>


<?php include "./scripts.php"; ?>