<?php session_start();
	include "./clases/Conexion.php";
	include "./clases/Crud.php";
	$crud = new Crud();
	$datos = $crud->mostrarDatos();

	$mensaje = '';
	if (isset($_SESSION['mensaje_crud'])) {
		$mensaje = $crud->mensajesCrud($_SESSION['mensaje_crud']);
		unset($_SESSION['mensaje_crud']);
	}
?>


<?php include "./header.php"; ?>
<div class="container">
	<div class="row">
		<div class="col">
			<div class="card mt-4 shadow-lg">
				<div class="card-body">
					<h2 class="text-center mb-3">🐾 CRUD de Animales</h2>

					<a href="./agregar.php" class="btn btn-success mb-3">
						<i class="fa-solid fa-paw"></i> Agregar nueva mascota
					</a>

					<hr>

					<table class="table table-striped table-hover table-bordered text-center align-middle">
						<thead class="table-dark">
							<tr>
								<th>Nombre Mascota</th>
								<th>Edad</th>
								<th>Especie</th>
								<th>Raza</th>
								<th>Nombre del Dueño</th>
								<th>Editar</th>
								<th>Eliminar</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($datos as $item): ?>
								<tr>
									<td><?php echo htmlspecialchars($item->nombre_mascota); ?></td>
									<td><?php echo htmlspecialchars($item->edad); ?></td>
									<td><?php echo htmlspecialchars($item->especie); ?></td>
									<td><?php echo htmlspecialchars($item->raza); ?></td>
									<td><?php echo htmlspecialchars($item->nombre_dueno); ?></td>

									<td>
										<form action="./actualizar.php" method="POST">
											<input type="hidden" name="id" value="<?php echo $item->_id; ?>">
											<button class="btn btn-warning btn-sm">
												<i class="fa-solid fa-pen-to-square"></i>
											</button>
										</form>
									</td>

									<td>
										<form action="./eliminar.php" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta mascota? 🐾');">
											<input type="hidden" name="id" value="<?php echo $item->_id; ?>">
											<button class="btn btn-danger btn-sm">
												<i class="fa-solid fa-trash"></i>
											</button>
										</form>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>

<?php include "./scripts.php"; ?>

<script>
	let mensaje = <?php echo $mensaje; ?>;
	console.log(mensaje);
</script>