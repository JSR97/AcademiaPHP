<?php
session_start();
$exp=$_SESSION['expediente'];
function conectar_bd()
{
	$conex=mysqli_connect('localhost', 'root', '') or die (mysqli_error());
        mysqli_select_db($conex,"ejemplo") or die (mysqli_error());
	return $conex;
}

function encontrar_asig($conex, $exp, $cod_asig)
{
 $encontrado=false;
 $query_mat="SELECT cod_asig FROM matriculas WHERE (expediente = ".$exp.")";
 $result_mat=mysqli_query($conex, $query_mat) or die(mysqli_error($conex));
 if (mysqli_num_rows($result_mat)!=0)
   {          
      while ($reg=  mysqli_fetch_array($result_mat))
      {
           
          print("<p>Asignatura alumno".$reg['cod_asig']);
          print("<p>Asignatura comparada".$cod_asig);
          if (strcmp($reg['cod_asig'], $cod_asig)==0)
          //if ($reg['cod_asig']==$cod_asig)
          {
              print("<p>Asignatura ".$cod_asig." ya matriculado</p>");
              $encontrado=true;
          }
      }
   }
  
   if ($encontrado==false)
   {
       print("<p>Asignatura ".$cod_asig." no matriculado aún</p>");
   }
return $encontrado;       
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Documento sin t&iacute;tulo</title>
</head>
<body>
<form action="./alta_matricula.php" method="post" name="form_matricula">
<?php
    $conex=conectar_bd();
    $query_alum="SELECT nombre FROM alumnos WHERE expediente LIKE '$exp'";
    $result_alum=mysqli_query($conex, $query_alum) or die(mysqli_error($conex));
    if (mysqli_num_rows($result_alum)!=0)
    {
        $reg_alum=mysqli_fetch_array($result_alum);
        $nom_alum=$reg_alum['nombre'];
        $cabecera=<<<CABECERA
          <p>Matriculación de alumno: $nom_alum</p>
CABECERA;
        print $cabecera;       
    }
    
    $matricula=false;
    print("<p>Asignaturas: </p>");
    print ("<select name='asignaturas_mat'>");
    
    //con una sola consulta
    $query_mat_noalum="SELECT * FROM asignaturas WHERE cod_asig NOT IN 
                  (SELECT cod_asig FROM matriculas WHERE expediente ='$exp')";  
    $result_asig=mysqli_query($conex, $query_mat_noalum) or die(mysqli_error($conex));
    if (mysqli_num_rows($result_asig)!=0)
    {
        while ($reg_asig=mysqli_fetch_array($result_asig))
        {
          $cod_asig=$reg_asig['cod_asig'];
          $nom_asig=$reg_asig['nom_asig'];
           
           print ("<option value='$cod_asig'>$nom_asig");
          
       }
    }
   //CON DOS CONSIULTAS ANIDADAS
    /*  
    $query_asig="SELECT * FROM asignaturas";
    $result_asig=mysql_query($query_asig, $conex) or die(mysql_error());
    if (mysql_num_rows($result_asig)!=0)
    {
        while ($reg_asig=mysql_fetch_array($result_asig))
        {
          $cod_asig=$reg_asig['cod_asig'];
          $nom_asig=$reg_asig['nom_asig'];
          
          //si no encuentra la signatura en matriculas del alumno
          $query_asig_alum="SELECT * FROM matriculas WHERE (cod_asig = ".$cod_asig.") and  (expediente = ".$exp.")";
           $result_asig_alum=mysql_query($query_asig_alum, $conex) or die(mysql_error());
           //
           if (mysql_num_rows($result_asig_alum)==0)
          //if (encontrar_asig($conex, $exp, $cod_asig)==false) //tb. se puede hacer con la función que he creado
          {
           $matricula=true;
           
           print ("<option value='$cod_asig'>$nom_asig");
           
          } 
       }
    }
    
    */
    print("</select>");
    //if ($matricula==false)
    if (mysqli_num_rows($result_asig)==0)
    {
        print ("<p>El alumno ya está matriculado en todas las asignaturas</p>");
    }
    else {
      print("<p>Calificación: <input name='calificacion' type='text' size='5' maxlength='5'/></p>");   
       print("<p><input name='matricular' type='submit' value='Matricular'/></p>");
    }
   
    mysqli_close($conex);
?>
    
</form>

</body>
</html>


