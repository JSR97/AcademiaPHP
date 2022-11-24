<?php 

$exp = $_POST["exp"];
$nom = $_POST["nombre"];
$user = $_POST["user"];
$pwd = $_POST["pwd"];
$pwd2 = $_POST["pwd2"];
$f_nac = $_POST["f_nac"];
$orig = $_POST["GrOpc_proc"];
$email=$_POST["email"];
$observ=$_POST["observaciones"];


function mensaje_error($mensaje)
{
?>
	
 	<script language="JavaScript" type="text/JavaScript">
		var mensaje="<?php echo $mensaje; ?>";
		alert(mensaje);
		
		<!-- pinta formulario en blanco y le devuelve el control-->
		<!--location.href="form_datos_online.php";-->
		
	</script>
<?php
}


function validar_datos(&$exp, &$nom, &$user, &$pwd, &$pwd2, &$email, &$f_nac)
{
    
    $error="";
    $validado=true;
    if (($exp=="")||(!preg_match("/^[0-9]{5}/", $exp)))
    {
        $exp="";
        //mensaje_error("Expediente invalido"); //con java script
        $error=$error."expediente invalido"; //con ph*/
        
        $validado=false;
        
    }
 /**************************
    if ($exp=="")
 {
  	mensaje_error("Falta EXPEDIENTE");
	return false;
 }
 else
 {
 	 if (strlen($exp)!=5)
	{
		$longitud=strlen($exp);
		mensaje_error ("Formato EXPEDIENTE - 5 números");
		return false;
	}
	else 
	{
		for ($i=0; $i<strlen($exp); $i++)
		{
			if (($exp[$i]<'0')||($exp[$i]>'9'))
			{
				mensaje_error ("Formato EXPEDIENTE - 5 números");
				return false;
			}
		}
	}
 }
 *************/
/*   
if (($email=="")||
   (!preg_match("/[[:alpha:]][[:alnum:]]*@[[:alpha:]]+\.[[:alpha:]]+/",$email)))
    {
        $email="";
        mensaje_error("Email INCORRECTO");
        return false;
        //$error=$error." / email incorrecto";
        
    }
  */
 if ($email=="")
 {
     $email="";
     $error=$error." / email incorrecto";
     $validado=false;
 }
    
 if ($nom=="")
 {
 
	//mensaje_error("Falta nombre");
     $nombre="";
     $error=$error." / nombre incorrecto";
     $validado=false;

 }
  else
  {
   		$nom=trim($nom);
		$nom=addslashes($nom); 
  }
  
  if ($user=="")
 {
      $user="";
     $error=$error." / usuario incorrecto";
     $validado=false;
	/*mensaje_error("Falta usuario");
	return false;
         * */
         
 }
  else
  {
   		$user=trim($user);
		$user=addslashes($user); 
  }
  
  if ($pwd=="")
 {
        $pwd="";
     $error=$error." / clave incorrecto";
     $validado=false;
	/*mensaje_error("Falta clave");
	return false;
         * */
        
 }
  else
  {
  	if($pwd!=$pwd2)
	{
		/** mensaje_error("Debe coincidir la clave y su repetición");
		return false;
                 */
                 $pwd="";
                 $error=$error." / clave incorrecto";
                 $validado=false;
                 
	}		
  }
 
  
  
  
  //sobraría realmente el control de fecha al ponerlo de tipo "date"
  if ($f_nac=="")
 {
        $f_nac="";
     $error=$error." / fecha incorrecta";
     $validado=false;
	/*mensaje_error("Falta fecha nacimiento");
	return false;
         * 
         */
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
 
 echo($error);
 return $validado;
}//fin validar_datos


function pintar_formulario_alta($exp, $nom, $user, $pwd, $pwd2, $email, $f_nac, $orig, $observ)
{

$formulario1=<<<FORMULARIO1
<form action="./valid+alta_alum.php" method="post" name="form_insert_alum">
  <p>DATOS DEL ALUMNO </p>

  <p>
    Expediente:
    <input name="exp" type="text" size="5" maxlength="5" value="$exp">
  </p>
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
	<input name="pwd2" type="password" size="8" maxlength="8" value="$pwd2">
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
    <input type='email' name="email" value="$email">
</p>

<p>Observaciones: 
    <textarea name="observaciones" cols="40" rows="10" value=$"$observ"></textarea> 
</p>

  <p>
    <input type="submit" name="Submit" value="Enviar">
</p>

</form>
FORMULARIO2;
print $formulario2;
}//fin_pintar
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sin t&iacute;tulo</title>


<?php

if (!validar_datos($exp, $nom, $user, $pwd, $pwd2, $email, $f_nac))
{
	pintar_formulario_alta($exp, $nom, $user, $pwd, $pwd2, $email, $f_nac, $orig, $observ);

}
else
{
 
  $conex=mysqli_connect('localhost', 'root', '') or die (mysqli_error($conex));
  mysqli_select_db($conex,"ejemplo") or die (mysqli_error($conex));
 
 //include 'conexion_bd.php';
 
//if ($conex==FALSE)
 if (mysqli_error($conex))
 {
	echo ('Error conexión');
	exit();
 }	
 else //dar alta
 {
    //**************inserción normal
	//$fecha=explode("-", $f_nac);
        
	//ojo!!- concertir fecha formato de bd
	//$f_nac=$fecha[2]."-".$fecha[1]."-".$fecha[0];
       
	$query="INSERT INTO alumnos 
			(expediente, nombre, usuario, clave, f_nac, origen, email, observaciones) 
		VALUES ('$exp', '$nom', '$user', '$pwd', '$f_nac', '$orig', '$email', '$observ')";
	$res_alum=mysqli_query($conex,$query) or die (mysqli_error($conex));
	if ($res_alum)
	{
		echo ('Alumno insertado');
	}
	else
	{
		echo ('Problemas de Inserción');
	}
 }
}
?>
</head>
<body>
</body>
</html>