<?php
session_start();
$exp=$_SESSION['expediente'];

$cod_asig=$_POST['asignaturas_mat'];
$calificacion=$_POST['calificacion'];

include 'conexion_bd.php';


       $query="INSERT INTO matriculas 
			(expediente, cod_asig, calificacion) 
		VALUES ('$exp', '$cod_asig', '$calificacion')";
	$res_alum=mysqli_query($conex, $query) or die (mysqli_error($conex));
	if ($res_alum)
	{
		echo ('Alumno matriculado');
	}
	else
	{
		echo ('Problemas de Inserción');
	}
        
        mysqli_close($conex);
       
?>
