<?php 
//$exp_alum=$_REQUEST['exp'];
session_start();
$exp_alum=$_SESSION['expediente'];

/*
$conex=mysql_connect('localhost', 'root', '') or die (mysql_error());
mysql_select_db("ejemplo") or die (mysql_error());
*/
include 'conexion_bd.php';
$query_mat="SELECT  cod_asig, calificacion
			FROM matriculas
			WHERE expediente LIKE'$exp_alum' ";

/*$query_mat="SELECT  mat.cod_asig, as.cod_asig, as.nom_asig, mat.calificacion
			FROM matriculas AS mat, asignaturas AS as
			WHERE expediente LIKE'$exp_alum' 
                              AND as.cod_asig=mat.cod_asig";
*/					
$res_mat=mysqli_query($conex, $query_mat) or die (mysql_error());
	if (mysqli_num_rows($res_mat)!=0)
	{
		$tabla_asig_header=<<<CABECERA
			<table width="70%"  border="1" cellspacing="1" cellpadding="1">
				<tr>
					<th>Asignatura</th>
					<th>Nota</th>
				</tr>
CABECERA;
			$tabla_asig_detail="";
			while ($reg=mysqli_fetch_array($res_mat))
			{
				$asignatura=get_asignatura($reg['cod_asig']);
				$calif_asig=$reg['calificacion'];
				
				
				$tabla_asig_detail.=<<<DETALLE
						  <tr>
							<td>$asignatura</td>
							<td>$calif_asig</td>
						  </tr>
DETALLE;
			}
	    
$tabla_asig_foot=<<<PIE
					</table>
PIE;

$tabla_asig=<<<TABLA_ASIG
				$tabla_asig_header
				$tabla_asig_detail
				$tabla_asig_foot
TABLA_ASIG;
print $tabla_asig;
	}
	else
	{
		echo "El alumno no tiene calificaciones";
	}



//averiguar nombre asignatura
function get_asignatura($id_asig)
{
 /*$conex=mysql_connect('localhost', 'root', '') or die (mysql_error());
 mysql_select_db("ejemplo") or die (mysql_error());
 */
    include 'conexion_bd.php';
 $query_as="SELECT  cod_asig, nom_asig 
			FROM asignaturas
			WHERE cod_asig='$id_asig' ";
				
$res_asig=mysqli_query($conex, $query_as) or die (mysql_error());
$reg=mysqli_fetch_array($res_asig);
$asig=$reg['nom_asig'];
return $asig;
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sin t&iacute;tulo</title>
</head>

<body>



</body>
</html>

