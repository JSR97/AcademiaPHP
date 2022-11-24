<?php 
	session_start();
	$exp=$_SESSION['expediente'];
	//$exp=$_REQUEST['exp'];
	/*$conex=mysqli_connect('localhost', 'root', '') or die (mysqli_error());
        mysqli_select_db($conex,"ejemplo") or die (mysqli_error());*/
        include 'conexion_bd.php';
	$query="SELECT * 
			FROM alumnos 
			WHERE expediente LIKE '$exp'";
	$res_alum=mysqli_query($conex, $query) or die (mysqli_error());
	if (mysqli_num_rows($res_alum)!=0)
	{
		while ($reg=mysqli_fetch_array($res_alum))
		{
		    
			$exp=$reg['expediente'];
			$nom=$reg['nombre'];
			$user=$reg['usuario'];
			$pwd=$reg['clave'];
			$pwd2=$pwd;
			$f_nac=$reg['f_nac'];
			$orig=$reg['origen'];
			$email=$reg['email'];
			$observ=$reg['observaciones'];
			
		}
	}
	
function mensaje_error($mensaje)
{
?>
	
 	<script language="JavaScript" type="text/JavaScript">
		var mensaje="<?php echo $mensaje; ?>";
		alert(mensaje);
		
		
	</script>
<?php
}


function validar_datos($nom, $user, $pwd, $pwd2, $email, $f_nac)
{
 
 if ($nom=="")
 {
 
	mensaje_error("Falta nombre");
	return false;
 }
  else
  {
   		$nom=trim($nom);
		$nom=addslashes($nom); 
  }
  
  if ($user=="")
 {
 
	mensaje_error("Falta usuario");
	return false;
 }
  else
  {
   		$user=trim($user);
		$user=addslashes($user); 
  }
  
  if ($pwd=="")
 {
 
	mensaje_error("Falta clave");
	return false;
 }
  else
  {
  	if($pwd!=$pwd2)
	{
		mensaje_error("Debe coincidir la clave y su repetición");
		return false;
	}		
  }
 
 if ($email=="")
 {
	mensaje_error("Falta email");
	return false;
 }
 else
 {
 	$dat_email=explode("@",$email);
	if (count($dat_email)!=2)
	{
		mensaje_error("Email incorrecto (cuenta@servidor.pais)");
		return false;
	}
	else
	{
		$servidor=explode(".", $dat_email[1]);
		if (count($servidor)!=2)
		{
			mensaje_error("Email incorrecto (cuenta@servidor.pais)");
			return false;
		}		
	}
 }
 
  if ($f_nac=="")
 {
	mensaje_error("Falta fecha nacimiento");
	return false;
 }
 /*else
 {
 	$fecha=explode("/", $f_nac);
	if (count($fecha)!=3)
	{
			mensaje_error("Fecha nacimiento no válida (dd/mm/aaaa)");
			return false;
	}
	else
	{
		$dia=$fecha[0];
		$mes=$fecha[1];
		$año=$fecha[2];
	
		if (!checkdate($mes,$dia,$año))
		{
			mensaje_error("Fecha nacimiento no válida (dd/mm/aaaa)");
			return false;
		}
	}
 }*/
 
 
 return true;
}//fin validar_datos

//pintar_formulario
function pintar_formulario($exp, $nom, $user, $pwd, $pwd2, $email, $f_nac, $orig, $observ)
{
/* sI FECHA ES TEXTO
$fecha=explode("-", $f_nac);
if (count($fecha)!=1)
{
	//convertir a formato dd/mm/aaaa
	$f_nac=$fecha[2]."/".$fecha[1]."/".$fecha[0];
}
*/
 
$formulario1=<<<FORMULARIO1
<form action="" method="post" name="form_insert_alum">
  <p>DATOS DEL ALUMNO con expediente $exp</p>
        
        
  <p>Nombre: 
  <input name="nombre" type="text" size="20" maxlength="20" value="$nom">
</p>
 <p>Usuario: 
    <input name="user" type="text" size="20" maxlength="20" value="$user">
</p>
 <p>Passsword: 
 	<input name="pwd" type="password" size="8" maxlength="8" value="$pwd">
</p>
 <p>Repetir Password: 
	<input name="pwd2" type="password" size="8" maxlength="8" value="$pwd">
</p>
 	<p>Fecha Nacimiento (dd/mm/aaaa): 
    <input type="date" name="f_nac" value="$f_nac">
</p>
  <p>Procedencia:
  </p>
  <p>
  <label>
FORMULARIO1;
print $formulario1;

print(" <input name='GrOpc_proc' type='radio' value='Local'");
if ($orig=='Local') 
 print ("checked>");
else
	print (">");
print("Local</label>
   	 <br>
    <label>");

print(" <input name='GrOpc_proc' type='radio' value='Regional'");
if ($orig=='Regional') 
 print ("checked>");
else
	print (">");
print("Castilla-León</label>
   	 <br>
    <label>");

print(" <input name='GrOpc_proc' type='radio' value='Nacional'");
if ($orig=='Nacional') 
 print ("checked>");
else
	print (">");
print("Otra comunidad</label>
   	 <br>
    <label>");

print(" <input name='GrOpc_proc' type='radio' value='Extranjera'");
if ($orig=='Extranjera') 
 print ("checked>");
else
	print (">");
print("Extranjero</label>
   	 <br>
    <label>");

 $formulario2=<<<FORMULARIO2
  <p>Email:
    <input type='text' name="email" value="$email">
</p>

<p>Observaciones: 
    <textarea name="observaciones" cols="40" rows="10">$observ</textarea> 
</p>

  <p>
    <input type="submit" name="Submit" value="Modificar">
</p>

</form>
FORMULARIO2;
print $formulario2;
}


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sin t&iacute;tulo</title>
</head>

<body>

<?php
if (!isset($_POST['Submit']))
{
	pintar_formulario($exp, $nom, $user, $pwd, $pwd2, $email, $f_nac, $orig, $observ);
}
else
{
	$nom = $_POST["nombre"];
	$user = $_POST["user"];
	$pwd = $_POST["pwd"];
	$pwd2 = $_POST["pwd2"];
	$f_nac = $_POST["f_nac"];
	$orig = $_POST["GrOpc_proc"];
	$email=$_POST["email"];
	$observ=$_POST["observaciones"];
	if (!validar_datos($nom, $user, $pwd, $pwd2, $email, $f_nac))
	{
		pintar_formulario($exp, $nom, $user, $pwd, $pwd2, $email, $f_nac, $orig, $observ);

	}
 	else
 	{
 	
 		/*$fecha=explode("/", $f_nac);
		//ojo!!- convertir fecha formato de bd
		*/
              //cuaNdo fecha es de tipo "date", se lee con separador "-"
               // $fecha=explode("-", $f_nac);
          
                //ojo!!- convertir fecha formato de bd
                //$f_nac=$fecha[2]."-".$fecha[1]."-".$fecha[0];
		$query="UPDATE alumnos SET nombre='$nom', 
							   usuario='$user', 
							   clave='$pwd', 
							   f_nac='$f_nac', 
							   origen='$orig', 
							   email='$email', 
							   observaciones='$observ'
				WHERE expediente='$exp'";
		$res_alum=mysqli_query($conex, $query) or die (mysqli_error());
		if ($res_alum)
		{
			echo ('Alumno Modificado');
		}
		else
		{
			echo ('Problemas de Actualización');
		}
		exit();
 	}
}

?>
	 
</body>
</html>
