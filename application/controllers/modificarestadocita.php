<?php
if(!empty($_POST)){
	$conexion=(mysqli_connect("localhost","root","cosiita"));
    mysqli_select_db($conexion,'hospital') or die ("no se encuentra la bd");	
	foreach($_POST as $field_name=>$val){
		echo $field_name; //codigo del horario
		echo $val; // nombre del estado		
				if(!empty($field_name)&&!empty($val)){					 
					mysqli_query($conexion,"UPDATE horarios set estado ='$val' where id='$field_name'");
					echo"registro modificado correctamente";
				}else{
					echo"no se pudo actualizar";
				}
	}
}
?>