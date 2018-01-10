<?php
if(!empty($_POST)){
	$conexion=(mysqli_connect("localhost","root","cosiita"));
    mysqli_select_db($conexion,'hospital') or die ("no se encuentra la bd");	
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$nombre=$_POST['nombre'];
	$Especialidad=$_POST['Especialidad']; 
	$telefono=$_POST['telefono'];
	$cedula=$_POST['cedula'];
	
	
	$password=$_POST['password'];
	$tipo='doctor';
	$id=null;

	$consultarmedico="SELECT * FROM datosmedico where idmedico='$idmedico'";
	$resultadomedico=mysqli_query($conexion,$consultarmedico);
	$busquedamedico=mysqli_fetch_array($resultadomedico);

	$consultarusuario="SELECT * FROM usuarios where nombre='$nombre'";
	$resultadousuario=mysqli_query($conexion,$consultarusuario);
	$busquedausuario=mysqli_fetch_array($resultadousuario);
	



	if(empty($busquedamedico)&&empty($busquedausuario)){
		$insertar="INSERT INTO usuarios (nombre, password, tipo) VALUES ('$nombre', '$password', '$tipo')";
        mysqli_query($conexion,$insertar) or die ("NO se pudo insertar");
        	$insertar="INSERT INTO datosusuario (idmedico, apellido, nombre, Especialidad, telefono, cedula, idimagen, titulo, ruta, cita) VALUES ('$nombre', '$apellido', '$nombre', '$Especialidad', '$telefono', '$cedula', 0, '$titulo','$ruta', 0)";
        mysqli_query($conexion,$insertar) or die ("NO se pudo insertar datos personales");
        
        mysqli_close($conexion);
			echo"true";
		}else{
		    if(!empty($busquedausuario)){
				echo "el nombre de usuario ya esta registrado";
			}
		}
}
?>