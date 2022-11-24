<?php
 session_start();
 $exp=$_SESSION['expediente'];
 //$exp=$_REQUEST['exp']; si lo pasamos como parámetros y no como sesión

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sin t&iacute;tulo</title>
</head>

<body>

<!--//EJEMPLO DE PASO DE VARIABLES DE PHP A jAVSCRIPT Y VICEVERSA!!!!-->

<script>
	var exp_alum="<?php echo $exp; ?>";
	var borrado=confirm("Seguro que deseas eliminar al alumno "+ exp_alum +"?");
</script>
<?php
	$confirmacion="<script> document.write(borrado) </script>";
	
	if (!($confirmacion))//(strcmp($confirmacion, "false"))
	{
		echo ('alumno NO borrado');
		exit();
	}
	else
	{
		include 'conexion_bd.php';
		//$exp_alum=$_REQUEST['exp']; si no paso expediente por sesión
		$query="DELETE FROM alumnos
				WHERE expediente LIKE '$exp' ";
					
			$res=mysqli_query($conex, $query) or die (mysqli_error($conex));
			if ($res)
			{
				echo('alumno borrado');
			}
			else
			{
				echo ('error en eliminación alumno');
			}

	}
	
?>
</body>
</html>