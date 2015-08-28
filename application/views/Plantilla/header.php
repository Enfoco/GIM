<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?= $titulo ?> | GIM</title>

  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("assets/css/main.css"); ?>" />
  
<script src="<?= base_url(); ?>assets/js/jquery.js"></script>

<script>
$(function(){
 
    tabla = $('#tabla');
    tr = $('tr:first', tabla);
    $('#agregarFila').live('click', function (){
        tr.clone().appendTo(tabla).find(':text').val('');
    });
 
    $(".eliminarFila").live('click', function (){
        $(this).closest('tr').remove();
    });
 
});
</script>
</head>
<body>

  <nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
  para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
    data-target=".navbar-ex1-collapse">
    <span class="sr-only">Desplegar navegación</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">Logotipo</a>
</div>

  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
  otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?= base_url();  ?>Contactos/">Home</a></li>
      <li><a href="<?= base_url() ?>Contactos/agregar">Agregar</a></li>
      <li><a href="<?= base_url() ?>Alumnos/index">Alumnos</a></li>
      
    </ul>
    
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">Enviar</button>
    </form>
    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Enlace #3</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Menú #2 <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Acción #1</a></li>
          <li><a href="#">Acción #2</a></li>
          <li><a href="#">Acción #3</a></li>
          <li class="divider"></li>
          <li><a href="#">Acción #4</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
