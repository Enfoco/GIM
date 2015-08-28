<div class="container"> 
    <?php
echo validation_errors();
?> 
    <form action="<?=base_url("Alumnos/create"); ?>" method="POST"> 

        <div id="account-field"> 
           <div> 
            Tipo Documento: <select name="tipoIdentificacion" id="tipoIdentificacion"> 
            <?php
foreach($tidentificacion as $fila) {
?> 
                <option value="<?=$fila->id
?>"><?=$fila->detalleTipoIdentificacion
?></option> 
                <?php
}
?>       
        </select> 
    </div> 

    <label>No. Identificación</label><span id="nidentificacion-error" class="registration-error"></span> 
    <div> 
        <input type="text" name="nidentificacion" id="nidentificacion" class="demoInputBox" placeholder="No. de Identifiacion del Estudiante"> 
    </div> 

    <label>Fecha Nacimiento</label><span id="fechaNacimiento-error" class="registration-error"></span> 
    <div> 
        <input type="date" name="fechaNacimiento" id="fechaNacimiento" placeholder="Fecha de Nacimiento del Estudiante"> 
    </div> 

    <label>Nombre</label><span id="nombres-error" class="registration-error"></span> 
    <div> 
        <input type="text" name="nombres" id="nombre" class="demoInputBox" placeholder="Nombre del Estudse"> 
    </div> 

    <label>Apellido</label><span id="apellidoPaterno-error" class="registration-error"></span> 
    <div> 
        <input type="text" name="apellidoPaterno" id="apellidoPaterno" class="demoInputBox" placeholder="Primer Apellido del Estudiante"> 
    </div> 

    <label>Apellido</label><span id="apellidoMaterno-error" class="registration-error"></span> 
    <div> 
        <input type="text" name="apellidoMaterno" id="apellidoMaterno" class="demoInputBox" placeholder="Segundo Apellido del Estudiante"> 
    </div> 


    <div> 

        RH: <select name="rh" id="rh"> 
        <?php
foreach($rh as $fila) {
?> 
            <option value="<?=$fila->id
?>"><?=$fila->detalleRh
?></option> 
            <?php
}
?>       
    </select> 
</div> 
<div>
    
 <select name="provincia" id="provincia">
        <?php 
        foreach($provincia as $fila)
        {
        ?>
            <option value="<?= $fila->idprovincia ?>"><?=$fila->detalleMunicipio ?></option>
        <?php
        }
        ?>      
    </select>
    
    <select name="localidad" id="localidad">
            <option value="">Selecciona tu provincía</option>
    </select>
</div>

<label>Dirección</label><span id="direccion-error" class="registration-error"></span> 
<div> 
    <input type="text" name="direccion" id="direccion" class="demoInputBox" placeholder="DirecciÃ³n de Residencia"> 
</div> 

<label>Teléfono</label><span id="telefono-error" class="registration-error"></span> 
<div> 
    <input type="text" name="telefono" id="telefono" class="demoInputBox" placeholder="# Telefonico del Estudiante"> 
</div> 

<label>Celular</label><span id="celular-error" class="registration-error"></span> 
<div> 
    <input type="text" name="celular" id="celular" class="demoInputBox" placeholder="# Celular del Estudiante"> 
</div> 

<label>Email</label><span id="correo-error" class="registration-error"></span> 
<div> 
    <input type="text" name="correo" id="correo" class="demoInputBox" /> 
</div> 

<label>Conviven<span id="convive-error" class="registration-error"></span> 
    <div> 
        <input type="text" name="convive" id="convive" class="demoInputBox" /> 
    </div> 

    <label>Institucion Anteriorn<span id="ianterior-error" class="registration-error"></span> 
        <div> 
            <input type="text" name="ianterior" id="ianterior" class="demoInputBox" /> 
        </div> 

        <div> 

            Sexo: <select name="genero" id="genero"> 
            <?php
foreach($genero as $fila) {
?> 
                <option value="<?=$fila->id
?>"><?=$fila->detalleGenero
?></option> 
                <?php
}
?>       
        </select> 
    </div> 
    <div> 

        IPS: <select name="ips" id="ips"> 
        <?php
foreach($ips as $fila) {
?> 
            <option value="<?=$fila->id
?>"><?=$fila->detalleIps
?></option> 
            <?php
}
?>       
    </select> 
</div> 


EPS: <select name="eps" id="eps"> 
<?php
foreach($eps as $fila) {
?> 
    <option value="<?=$fila->id
?>"><?=$fila->detalleEps
?></option> 
    <?php
}
?>       
</select> 

<div> 

    Estado: <select name="estado" id="estado"> 
    <?php
foreach($estado as $fila) {
?> 
        <option value="<?=$fila->id
?>"><?=$fila->detalleEstado
?></option> 
        <?php
}
?>       
</select> 
</div> 
<br> 

                <!-- 

                <hr> 
        <h3>Acudiente</h3> 
        <input type="button" value="Agregar" id="agregarFila"> 

         <table id="tabla"> 
        <tr> 
            <td><input type="text" name="nombrea[]" id="nombres" placeholder="Nombre del Alumno"></td> 
            <td><input type="text" name="apellido1a[]" id="apellidos1" placeholder="Apellido Paterno"></td> 
            <td><input type="text" name="apellido2a[]" id="apellidos2" placeholder="Apellido Materno"></td> 
            <td><input type="text" name="direcciona[]" id="direccions" placeholder="Direccion del Alumno"></td> 
            <td><input type="text" name="telefonoa[]" id="telefonos" placeholder="Telefono"></td> 
            <td><input type="text" name="celulara[]" id="celulars" placeholder="celular"></td><br/> 
            <td>    <input type="text" name="correoa[]" id="correos" placeholder="correo"></td> 
            <td><input type="text" name="identificaciona[]" id="identificacions" placeholder="identificacion"></td> 
            <td><input type="date" name="fechaNacimientoa[]" id="fechaNacimientos" placeholder="fechaNacimiento"></td> 
            <td><input type="text" name="tipodocumentoa[]" id="documentos" placeholder="documento"></td> 
            <td><input type="text" name="empresaa[]" id="empresa" placeholder="Empresa"></td> 
            <td><input type="text" name="tituloa[]" id="titulo" placeholder="Titulo"></td> 
            <td><input type="text" name="cargoa[]" id="cargo" placeholder="Cargo"></td> 
            <td><input type="button" value="Eliminar" class="eliminarFila"></td> 
        </tr> 
    </table> 

--> 

<input type="submit" value="Enviar"> 



</div> 
</form> 

</div> 





