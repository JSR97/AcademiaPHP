<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<h1>Datos del alumno</h1>
<?php 
	//$user=$_REQUEST['id_user']; -> si pasamos parámetros en enlace 
				     //<a> con "get"
	

$exp=$_SESSION['expediente'];
$nombre=$_SESSION['nombre'];
$orig=$_SESSION['origen'];

/* Si pasáramos solo expediente através de sesión y tuviera que volver a 
 * consultar los datos del alumno  para mostralos*/
/*
	$exp=$_SESSION['expediente'];

        include "conexion_bd.php"
	$query="SELECT expediente, nombre, origen 
				FROM alumnos 
				WHERE expediente LIKE '$exp'";
	$res_alum=mysqli_query($conex, $query) or die (mysql_error());
	if (mysql_num_rows($res_alum)!=0)
	{
		while ($reg=mysql_fetch_array($res_alum))
		{
			//printf("expediente: $reg['expediente'], 
                          //nombre: $reg['nombre'], origen: $reg['origen']");
			printf("expediente: %s, nombre: %s, origen: %s", 
                           $reg['expediente'], $reg['nombre'], $reg['origen']);
			
			
       
*/
printf("expediente: %s, nombre: %s, origen: %s", 
                          $exp, $nombre, $orig);
                    $calif_alum=<<<CALIFICACIONES
			</br>
			   <a href='get_calificaciones_alum.php' 
                               title='Información notas alumno $nombre'>Ver calificaciones</a>
							
CALIFICACIONES;
			
$delete_update_alum=<<<DEL_UPD
    <a href='borrar_alumno.php' title='Borrar alumno'>/ Eliminar</a>
    <a href='modificar_alumno.php' title='Actualizar datos del alumno'>/ Modificar</a>
    <a href='matricular_alumno.php' title='Matricular al alumno $nombre'>/ Matricular</a>
DEL_UPD;
	print("\n");
	print $calif_alum;
	print $delete_update_alum;
?>

</body>
</html>
