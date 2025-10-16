<?php include "./header.php"; ?>

<div class="container">
	<div class="row">
		<div class="col">
			<div class="card mt-4 shadow">
				<div class="card-body">
					<a href="index.php" class="btn btn-outline-info mb-3">
						<i class="fa-solid fa-angles-left"></i> Regresar
					</a>

					<h2 class="text-center mb-4">🐾 Agregar nueva mascota 🐾</h2>

					<form action="./procesos/insertar.php" method="post">
						<label for="nombre_mascota" class="form-label">Nombre de la mascota</label>
						<input type="text" class="form-control" id="nombre_mascota" name="nombre_mascota" required>

						<label for="edad" class="form-label mt-2">Edad</label>
						<input type="text" class="form-control" id="edad" name="edad" required>

						<label for="especie" class="form-label mt-2">Especie</label>
						<select class="form-select" id="especie" name="especie" required>
							<option value="">Selecciona una especie</option>
							<option value="Perro">Perro 🐶</option>
							<option value="Gato">Gato 🐱</option>
							<option value="Ave">Ave 🐦</option>
							<option value="Otro">Otro 🦎</option>
						</select>

						<label for="raza" class="form-label mt-2">Raza</label>
						<input type="text" class="form-control" id="raza" name="raza">

						<label for="nombre_dueno" class="form-label mt-2">Nombre del dueño</label>
						<input type="text" class="form-control" id="nombre_dueno" name="nombre_dueno" required>

						<button class="btn btn-success mt-4 w-100">
							<i class="fa-solid fa-floppy-disk"></i> Guardar Mascota
						</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<?php include "./scripts.php"; ?>