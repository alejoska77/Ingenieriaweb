<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(!empty($_POST)){
	$enlace=mysql_connect('localhost','root','cosiita');
	if (!$enlace){
		die('no se pudo conectar: '.mysql_error());
	}
	mysql_select_db('hospital');	
	foreach($_POST as $field_name=>$val){
		$field_id=strip_tags(trim($field_name));
		$val=strip_tags(trim(mysql_real_escape_string($val)));
		$split_data=explode(':',$field_id);
		$field_name=$split_data[0];
//		echo "UPDATE datosusuario set cita='0' where idusuario='$val'";
//		echo "UPDATE horarios set paciente='' where id='$field_name'";
		if(!empty($field_name)&&!empty($val)){			
			mysql_query("UPDATE datosusuario set cita='0' where idusuario='$val'") or mysql_error();
			mysql_query("UPDATE horarios set paciente='' where id='$field_name'") or mysql_error();
			echo"true";
		}else{
			echo"false";
		}
	}
}
?>