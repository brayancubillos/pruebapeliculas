<?php
session_start();
require 'conexion.php';
if(isset($_SESSION['valid']) && $_SESSION['valid'] == TRUE){
    $db = new MyDatabase();
	// $where="";
	//$nombre=$_POST['xnombre']//
	//$carrera=$_POST['xcarrera']//
	//$limit=$_POST['xregistros']
	//
	$query = "SELECT *  FROM peliculas ;";
	if(isset($_POST["nombre"])){
		
		$query = "SELECT *  FROM peliculas WHERE nombre = ".$_POST["nombre"].";";
	}else{
		$query = "SELECT *  FROM peliculas ;";
	}
	
    
    $listaDeUsuarios = $db->result($query);
?>


<html lang="es">

	<head>

      <title>Productiva Plus</title>
			<meta http-equiv="content-type" content="text/html; charset=iso-8855-1 ">
			<link rel="stylesheet" href="css/estilos.css">
      <link rel="stylesheet" href="css/bootstrap.css">
	   	<link href="css/bootstrap.min.css" rel="stylesheet">
	  	<link href="css/bootstrap-theme.css" rel="stylesheet">
	  	<script src="js/jquery-3.1.1.min.js"></script>
	  	<script src="js/bootstrap.min.js"></script>
		<script src="push.js-master/push.min.js"></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
 <script>
	     Push.create("Productiva Plus dice:",{
			 body: 'Bienvenido DIRECTIVO',
			 icon:"img/icono.ico",
			 timeout:4000
		 });
	  </script>



<header>
      <img src="img/banner.PNG" align=center height="170px" width="100%" >
    </header>
<body>
  <br>
      <div class="row">
        <div class="col-md-1">
        </div>
	    <div class="col-md-2">
		  <ul class="acorh">

              <li id="opcion1"><a>Peliculas</a>
                  <ul>
				      <li><a href="calificar.php">Calificar</a></li>
                     
                  </ul>
              </li>
              <li id="opcion3"><a href="cerrarsesion.php">Salir</a>
			        </li>

          </ul>
		 </div>
     <br>
	  <div class="container">
						  
	       <div class="col-md-9 well">
		   <div class="container">
	      
	     
      </div>
		       
      <table class="table display AllDataTables">
              <thead>
    				<th style='width:5px;'>NOMBRE</th>
    				<th style='width:5px;'>CATEGORIA</th>
    				<th style='width:5px;'>CALIFICACION</th>
            

    			</thead>
                <?php
                    foreach ($listaDeUsuarios as $peliculas){
                ?>
                <tr>
                    
                <td><?php echo $peliculas->nombre;?>
			        </td>
                    <td><?php echo $peliculas->genero;?>
			        </td>
              <td><?php echo $peliculas->calificacion;?>
			        </td>
			             
			  </tr>
                    <?php
                     }
                    ?>
             </table>
		   </div>
	      
      </div>
	 
 <style>
	   #main-container{
	margin: 150px auto;
	width:600px;
}

th,td{
	border:solid 2px black;
	padding:10px;
}
thead{
	background-color: #238276;
	border-bottom:solid 5px #0F362D;
	color:white;
}
tr:nth-child(even){
	background-color:#ddd;
}

tr:hover td{
	background-color:#fc7323;
	color:white;
}
.well{
	
	background-color:#DDE6FF;
}
 </style>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script>
	
		$(document).ready( function () {
		    $('.AllDataTables').DataTable({
		    	language: {
		    		"sProcessing":     "Procesando...",
				    "sLengthMenu":     "Mostrar _MENU_ registros",
				    "sZeroRecords":    "No se encontraron resultados",
				    "sEmptyTable":     "Ningún dato disponible en esta tabla",
				    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				    "sInfoPostFix":    "",
				    "sSearch":         "Buscar:",
				    "sUrl":            "",
				    "sInfoThousands":  ",",
				    "sLoadingRecords": "Cargando...",
				    "oPaginate": {
				        "sFirst":    "Primero",
				        "sLast":     "Último",
				        "sNext":     "Siguiente",
				        "sPrevious": "Anterior"
				    },
				    "oAria": {
				        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
				    }
		    	}
		    });
			
		} );
	</script>
    </div>

<style>
.label {
color: white;
padding: 8px;
font-family: sans-serif;
font-size: 24px;
}
.admin {background-color: #59b548;} /* Green */
.aprendiz {background-color: #fc7323;} /* Blue */
.directivo {background-color: #238276;} /* Orange */
.gruposeg {background-color: #238276;} /* Red */
</style>
<br><br>
</body>


</html>

    <?php
} else{
    header('Location: index.php');
    die();
}
