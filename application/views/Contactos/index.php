<hr>
<div class="container">
	<h1>Pagina principal del controlador Contactos</h1>

	<table class="table table-hover">
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Telefono</th>
			<th>Direccion</th>
		</tr>

		<?php foreach ($contactos as $key ): ?>

			<tbody>
				<tr>
					<td><?php echo $key ->id; ?></td>
					<td><?php echo $key ->nombre; ?></td>
					<td><?php echo $key ->direccion; ?></td>
					<td><?php echo $key ->telefono; ?></td>
				</tr>
			</tbody>
		</table>

	<?php endforeach ?>

</div>