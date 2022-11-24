<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	session_start();
	$user=$_POST['user'];
	$pwd=$_POST['pwd'];
	
	include 'conexion_bd.php';	
        
                
		$query="SELECT expediente, usuario, clave, nombre, origen
			FROM alumnos 
			WHERE (usuario LIKE '$user') and 
                            (clave LIKE '$pwd')";
		$res_valid=mysqli_query($conex,$query) 
                        or die (mysqli_error($conex));
		if ((mysqli_num_rows ($res_valid)==0) || !$user || !$pwd)
		{
			/*echo "usuario o clave incorrectos";
			header("location: login.php");
			*/
		?>
		
			<script language="javascript" type="text/javascript">
				alert("Usuario o clave incorrectos");
				location.href="login.php";
			</script>
 		<?php
			
		}
		else
		{
			$reg_usuario=mysqli_fetch_array($res_valid);
			$_SESSION['expediente'] = $reg_usuario['expediente'];
			
                        $_SESSION['nombre'] = $reg_usuario['nombre'];
                        $_SESSION['origen'] = $reg_usuario['origen'];
                        
                        header("location: mostrar_alum.php");
			
		}

	

?>
	
	
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sin t&iacute;tulo</title>
</head>

<body>

</body>
</html>

