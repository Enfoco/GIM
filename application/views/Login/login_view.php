<body data-pinterest-extension-installed="cr1.38.3"><div class="loginboxWrapper" style="position:relative;">
<div style="position:absolute; top:-36px; left:0px; width:695px; height:35px; color:#ffbb00; font-size:14px;" align="center">

</div>
<?php
$username = array('name' => 'username', 'placeholder' => 'E-mail Usuario', 'class' => 'form-control');
$password = array('name' => 'password', 'class' => 'form-control', 'placeholder' => 'Clave');
$submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión', 'class' => 'btn btn-lg  btn-block');
?>

<div class="lw_left">
	<div class="lw_logo"><img src="<?= base_url("assets/images/login-logo.png");?>" width="171" height="161"></div>
</div>
<div class="lw_right">
<h1>Login</h1>


<p>Por favor , rellene el siguiente formulario con sus datos de acceso :</p>

<div class="form">

<?=form_open(base_url("login/new_user"))?>

		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td>
	<?=form_input($username)?></td>
  </tr>
  <tr>
    <td style="height: 36px;"><?=form_password($password)?></td>
  </tr>
 <tr><td id="pid" style="color:#C60;background:url(/images/warning.png) no-repeat;display:none;padding-left:25px;"></td></tr>
  <tr>
    <td style="padding:0px;">
    <table width="60%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td style="padding:0px;"><input id="ytUserLogin_rememberMe" type="hidden" value="0" name="UserLogin[rememberMe]"><input name="UserLogin[rememberMe]" id="UserLogin_rememberMe" value="1" type="checkbox"></td>
    <td align="left" style="padding:0px;"><label for="UserLogin_rememberMe">Recordad Contraseña</label></td>
  </tr>
</tbody></table>


		</td>
  </tr>
  <tr>
    <td>
    <table width="60%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td><?=form_hidden('token',$token)?>
				<?=form_submit($submit)?></td>
    </td>
  </tr>
</tbody></table>

	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</tbody></table>

<?=form_close()?></div>
</div>
<div class="clear"></div>
</div>
<!--login credentials-->
<div class="logincredential">
	<ul>
    	<li>
        	<h6>Administrador Login</h6>
            <p>Usuario : admin<br>Clave : admin</p>
        </li>
<li>
        	<h6>Docente Login</h6>
            <p>Usuario : E-mail<br>Clave : teacher</p>
        </li>

    </ul>
    <div class="clear"></div>
</div>
<?php
				if($this->session->flashdata('usuario_incorrecto'))
				{
				?>
				<p><?=$this->session->flashdata('usuario_incorrecto')?></p>
				<?php
				}
				?>
