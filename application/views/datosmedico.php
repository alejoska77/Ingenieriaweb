<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Mis datos personales</title>
</head>
<body>
   <div class="container">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#miMenu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="frmmedico.php" class="navbar-brand">Bienvenido doctor
				<?php
					session_start();
					echo $_SESSION['nombre'];
					?>
				</a>
			</div>		
			<div class="collapse navbar-collapse" id="miMenu">
				<ul class="nav navbar-nav">
					<li class="active"><a href="datosmedico.php">Datos personales</a></li>
					<li><a href="citasdoctor.php">Citas</a></li>
					<li><a onclick="cambiar();" href="#">Cambiar contraseña</a></li>
					<li><a href="php/cerrarsesion.php"><span class="label label-danger">CERRAR SESION </span></a></li>								
				</ul>
			</div>
		</div>
	</nav>
</div>
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">MIS DATOS PERSONALES</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>APELLIDO</th>
					<th>NOMBRE</th>	
					<th>ESPECIALIDAD</th>	
					<th>TELEFONO</th>	
					<th>CEDULA</th>	
					<th>TITULO</th>	
					<th>RUTA</th>	
											
				</tr>
			</thead>
			<tbody>
				<?php
				    require('php/conexion.php');
				     $user=$_SESSION['nombre'];
				     $result=mysqli_query($conexion,"SELECT * FROM datosmedico where idmedico='$user'");				    
				     while ($medico=mysqli_fetch_array($result)){					 
					 echo "<tr><td id='id:$user' class='cam_editable'>".$user."</td>";
					 echo "<td id='cedula:$user' class='cam_editable' contenteditable='true'>".$medico['apellido']."</td>";
				     echo "<td id='nombre:$user' class='cam_editable' contenteditable='true'>".$medico['nombre']."</td>";
					 echo "<td id='apellido:$user' class='cam_editable' contenteditable='true'>".$medico['especialidad']."</td>";
					 //////////////////////////////////////
					 echo "<td id='sangre:$user' class='cam_editable' contenteditable='true'>".$medico['telefono']."</td>";
					 echo "<td id='direccion:$user' class='cam_editable' contenteditable='true'>".$medico['cedula']."</td>";
					 echo "<td id='correo:$user' class='cam_editable' contenteditable='true'>".$medico['titulo']."</td>";
					 echo "<td id='telefono:$user' class='cam_editable' contenteditable='true'>".$medico['ruta']."</td>";
		
					 echo"</tr>";
					 }
				?>				
			</tbody>					
		</table>
	</div>
	</div>	
	</div>



<p></p>
	<p></p>
	<center> 
	 <button type="button" onclick="ventananuevo();" class="btn btn-primary btn-lg" >
          <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Registrarse
    </button>
	</center> 

<!--//////////////////////////////////////////////////////////////////////////////////////////////////-->



<!--//////////////////////////////////////////////////-->
 <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">cambiar contraseña</h4>
            </div>
            <form role="form"  id= "frmcambiar" name="frmcambiar" onsubmit="cambiarpassword(); return false">
              <div class="col-lg-12">               

                <div class="form-group">
                  <label>vieja contraseña</label>
                  <input  name="password0" id="p" class="form-control" type="password"required>
                </div>
                <div class="form-group">
                  <label>nueva contraseña</label>
                  <input  name="password1" id="p3" class="form-control" type="password"required>
                </div>
                
                <div class="form-group">
                  <label>repita nueva password</label>
                  <input  name="password2" id="p4" class="form-control" type="password" required>
                </div> 
                 <button type="submit" class="btn btn-primary btn-lg" button='agregar'>
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Cambiar
                </button> 
              </div>
            </form>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
<!--//////////////////////////////////////////////////-->	
<script src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/change.js"></script>
<script type="text/javascript">        
	function cambiar(){
          $('#modal2').modal('show');

        }
    </script>

<!--//////////////////////////////////////////////////////////////////////////////////////////////////-->
</body>