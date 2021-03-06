<?php
session_start();
require 'conexion.php';
if(isset($_SESSION['valid']) && $_SESSION['valid'] == TRUE){
    $db = new MyDatabase();
	
	$con=mysqli_connect("localhost","root","","test");
?>





<!DOCTYPE html>
<html lang="es">
<head>

    <title>Productiva Plus</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8855-1 ">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  <link rel="icon" href="img/icono.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <title>Inicio Secion</title>
</head>
    <header>
      <img src="img/banner.PNG" align=center height="170px" width="100%" >

        <div class="column" style="background-color: #238279">
            <center>
          <div class="dropdown">
            <button class="dropbtn"onclick="window.location.href = 'administrador.php';">Inicio</button>
            <div class="dropdown-content">
            </div>
          </div>

          <div class="dropdown">
            <button class="dropbtn"   onclick="window.location.href = 'https://senaintro.blackboard.com/webapps/portal/execute/tabs/tabAction?tab_tab_group_id=_602_1#';" target="_blank">Ingresar a blackboard</button>
            <div class="dropdown-content">
            </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn" onclick="window.location.href = 'alternativas.php';">Alternativas</button>
            <div class="dropdown-content">
            </div>
          </div>


          <div class="dropdown">
             <button class="dropbtn" onclick="window.location.href = 'buscador.php';">Ayuda y Soporte</button>
            <div class="dropdown-content">
            </div>
          </div>
            </center>
        </div>


    </header>
<body>
  <br>
      <div class="row">
        <div class="col-md-1">
        </div>
	    <div class="col-md-2">
		   <ul class="acorh">

              <li id="opcion1"><a>Crear</a>
                  <ul>
				      <li><a href="Registro_Directivo.php">Crear Directivo</a></li>
                     <li><a href="registro_instructor.php">Crear Grupo de Seguimiento</a></li>
                     <li><a href="registro_programa.php">Crear Programa de Formación</a></li>
                     <li><a href="registro_ficha.php">Crear Ficha</a></li>
                  </ul>
              </li>

              <li id="opcion3"><a>Consultar</a>
                   <ul>
                      <li><a href="admaprend.php">Aprendices</a></li>
                      <li><a href="consultargs.php">Instructores</a></li>
	                  <li><a href="consultardir.php">Directivos</a></li>
					  <li><a href="eviapadm.php">Evidencias de Aprendices</a></li>
					  
					  <li><a href="visitasadm.php">Visitas</a></li>
                  </ul>
              </li>

              <li id="opcion3"><a href="cerrarsesion.php">Salir</a>
			        </li>

          </ul>
		 </div>
		     <div class="col-md-6 ">
			 <br><br>
           <table class="table display AllDataTables">


                      <thead>
			              <tr>
				             <th>Numero de Documento</th><th style="width:100%" >Descripcion</th><th>Nombre Documento</th><th>Ficha</th><th>OPERACIONES</th>
				          </tr>
			          </thead>
                    <?php
				
					$log = mysqli_query($con,"SELECT * FROM doc_ap");
                       while ($docs = mysqli_fetch_array ($log)){
						   
					?>
               
              <tr>
                   
		            <td> <?php echo $docs['num_doc']; ?>
			        </td>
                    <td> <?php echo $docs['nom_doc']; ?>
			        </td>
					 <td> <?php echo $docs['fecha_doc']; ?>
			        </td>
		            <td><a href="Informes/<?php echo $docs['archivo_doc']; ?>"><?php echo $docs['archivo_doc']; ?></a>
			        </td>

			      <td >
                       <center>
                       <a href="admaliap.php?nom_doc=<?php echo $docs['nom_doc'];?>" class="btn btn-sm btn-danger">&nbsp&nbsp&nbspEliminar</a>
					   </center>
                   </td>

			  </tr>
                  <?php
					   }
					  ?>	



          </table>



		</div>

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
 </body>
    
    <!--Codigo del pie de pagina-->
    <footer>
        <div id="footer">
        <div class=col-sm-3>
        </div>
    			<div class="containerFooter">
    				<div class='bloqueZona10 '>
            <div class="tabla1 tablaBloque23856">
                                <script type="text/javascript">
                        $(document).ready(function () {
                            $("#tablaEditor23856").click(function () {
                                $("#content-Editor23856").slideToggle("slow", function () {
                                });
                            });
                        });
                    </script>
                                <div>
                        <h2 class="titulo1">Enlaces de inter&eacute;s</h2>
                        <a class="alternar-editor" id="tablaEditor23856"></a>                    <span class="hide">content</span>
                    </div>
                            <div id="content-Editor23856" class="contenido1">
                    <div class='bloqueZona10 '>
                <div class="enlacesGenerales1 tablaBloque23863">

                                                        <div class="contenido1">
                            <ul class="enlace1">


    			<li><a href="docs/Manual de Usuario Productiva plus+ V 2.0.pdf" title="Manual de usuario."><span title="Manual de usuario." > </span>Manual del usuario</a></li>

    			<li><a href="#" title="Preguntas frecuentes."><span title="Preguntas frecuentes." target="_blank"> </span>Preguntas frecuentes</a></li>

    			<li><a href="https://caprendizaje.sena.edu.co/sgva/SGVA_Diseno/pag/login.aspx" title="Sistema de Gestión Virtual de Aprendices." target="_blank"><span title="Sistema de Gestión Virtual de Aprendices." > </span>Sistema de Gestión Virtual de Aprendices</a></li>                        </ul>
                        </div>
                                </div>
                </div>            </div>
            </div>

            </div>
    				<div class='bloqueZona11 '>
            <div class="tabla1 tablaBloque23870">
                                <div>
                        <h2 class="titulo1">Contacto</h2>
                                            <span class="hide">content</span>
                    </div>
                            <div id="content-Editor23870" class="contenido1">
                    <!-- <p></p> -->
    <div class="enlacesGenerales1 tablaBloque23405">
    <div class="contenido1">
    <ul class="enlace1">
    	<li><span class="icon-phone"><span style="display:none">a</span></span>PBX: 596 0100 Ext. 15458</li>
    	<li><span class="icon-user"><span style="display:none">a</span></span>Horario de atenci&oacute;n: 8:30 am a 5:30 pm, Lunes a Viernes</li>
    	<li>Direcci&oacute;n: Calle 15 No. 31-42 Torre Occidental, Tercer Piso</li>
    	<li><span class="icon-envelope-alt"><span style="display:none">a</span></span>Complejo Paloquemao Bogot&aacute; D.C.</li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    </div>

    				<div class='bloqueZona12 '>            <script type="text/javascript">
                    function destino() {
                        url = document.navegador.secciones.options[document.navegador.secciones.selectedIndex].value
                        if (url != "0")window.location = url;
                    }
                </script>
                <div class="enlacesGenerales0 tablaBloque23917">

                                        <h2 style="text-align:center;">S&iacute;guenos:</h2>
                                                        <div class="contenido0">
                            <ul class="enlace0">
                                <a href="https://es-la.facebook.com/SENAColombiaOficial/" title="Ir al Facebook del SENA." ><img src="./img/face.png"></a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    			<a href="https://twitter.com/senacomunica?lang=es" title="Ir al Twitter del SENA."><img src="./img/twitter.png"></a>

    			<a href="https://www.instagram.com/senacomunica/?hl=es-la" title="Ir al Instragram del SENA."><img src="./img/insta.png"></a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    			<a href="http://disenometrologia.blogspot.com/" title="Ir al blog del Centro de Dise&ntilde;o y Metrolog&iacute;a." target="_blank"><img src="./img/blog.png"></a>                        </ul>
                        </div>
                                </div>
                </div>
    				<p>&copy; 2018 Productiva Plus - Todos los derechos reservados<!--&oacute;ó--><br> <!--&ntilde;ñ--> Desarrollo Ficha 1367314</p>
    </footer>

</html>

<?php
} else{
    header('Location: index.php');
    die();
}