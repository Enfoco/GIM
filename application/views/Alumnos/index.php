<div class="container">
<hr>
<h4>Alumnos Registrados</h4> 
<div class="well well-sm"> <button type="button" class="btn btn-primary btn-xs"><a href="<?= base_url("Alumnos/create"); ?>">Nuevo</a></button></div>


<table class="table table-hover">
	<thead>
		<tr>
			<th># Identificación</th>
			<th>Nombres</th>
			<th>1er Apellido</th>
			<th>2do Apellido</th>
			<th>Dirección</th>
			<th>Telefono</th>
			<th>Celular</th>
			<th>Dirección</th>
			<th>Correo</th>
			<th>Convive</th>
			<th>I-Anterior</th>
		</tr>
	</thead>
	<?php foreach ($alumnos as $item ): ?>
		<tbody>
			<tr>
				<td><?= $item->identificacion;  ?></td>
				<td><?= $item->nombres;  ?></td>
				<td><?= $item->apellidoPaterno ?></td>
				<td><?= $item->apellidoMaterno ?></td>
				<td><?= $item->direccion;  ?></td>
				<td><?= $item->telefono;  ?></td>
				<td><?= $item->celular;  ?></td>
				<td><?= $item->direccion;  ?></td>
				<td><?= $item->correo;  ?></td>
				<td><?= $item->convive;  ?></td>
				<td><?= $item->ianterior;  ?></td>
			</tr>

		</tbody>
	<?php endforeach ?>
</table>

</div>