<hr>

<h1>Pagina para agregar Contactos</h1>

<?php echo form_open(base_url() . 'Contactos/AgregarContacto'); ?>
	

<input type="text" name="nnombre"><br>
<input type="text" name="ndreccion"><br>
<input type="text" name="ntelefono">

<input type="submit" value="Enviar">

<hr>

<?php echo form_close(); ?>