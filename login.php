
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	session_unset();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sin t&iacute;tulo</title>
</head>
<body>

<form action="valid_alum.php" method="post">
	<p>
	<label>Usuario: </label> <input name="user" type="text">
	</p>
	<p>
	<label>Clave: </label> <input name="pwd" type="password" maxlength="8">
	</p>
	<p>
	<input name="envio" type="submit" value="Enviar">
	<a href="form_alta_alum.html">Registrar Nuevo Alumno</a>
	</p>
</form>

</body>
</html>

