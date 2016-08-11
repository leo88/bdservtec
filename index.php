<!DOCTYPE html>
<html lang="en">

<!--
  * version: 1.5 26/07/2016
-->

<head>
	<title>Wold Servtec</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="shortcut icon" href="imagen/icono4.png">-->
  <?php date_default_timezone_set('America/Bogota'); ?>

	<link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/bootstrap-responsive.css"/>
	<link rel="stylesheet" href="css/tablaResponsive.css"/>
	<link rel="stylesheet" href="css/datatable.css"/>
	<link rel="stylesheet" href="css/miestilo.css">
	<link rel="stylesheet" href="fonts/style.css">
	<link rel="stylesheet" href="css/chosen.css">
	<link rel="stylesheet" href="css/chosen-bootstrap.css">
	<link rel="stylesheet" href="css/animate.css">
	<script src="js/jquery-1.12.3.min.js"></script>
  <script src="js/chosen.jquery.js"></script>
  <script src="js/script.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-tab.js"></script>
	<script src="js/jquery-datatable.js"></script>

</head>
<body>
	<nav class="navbar navbar-default">
  		<div class="container-fluid">
    		<div class="navbar-header">
    			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      			</button>
      			<a class="navbar-brand active" href="index.php">Wold Comunicaciones Servicio Técnico</a>
    		</div>
			<div class="collapse navbar-collapse" id="myNavbar">
    			<ul class="nav navbar-nav">
      				<li class="dropdown" id="registrar">
      					<a class="dropdown-toggle" data-toggle="dropdown" href="">Registrar
      					<span class="caret"></span></a>
      					<ul class="dropdown-menu">
      						<li><a href="index.php?pag=2">Proveedor</a></li>
      						<li><a href="index.php?pag=4">Vendedor</a></li>
      						<li><a href="index.php?pag=6">Clientes</a></li>
      					</ul>
      				</li>
      				<li class="dropdown" id="venta">
      					<a class="dropdown-toggle" data-toggle="dropdown" href="">Venta
      					<span class="caret"></span></a>
      					<ul class="dropdown-menu">
                  <li><a href="index.php?pag=10">Venta</a></li>
      						<li><a href="index.php?pag=16">Ultimo Movimiento</a></li>
                </ul>
      				</li>
      				<li class="dropdown" id="st">
      					<a class="dropdown-toggle" data-toggle="dropdown" href="">Servicio Técnico
      					<span class="caret"></span></a>
      					<ul class="dropdown-menu">
      						<li><a href="index.php?pag=18">Registro del Servicio</a></li>
      						<li><a href="index.php?pag=14">Servicio Tecnico Entregado</a></li>
      					</ul>
      				</li>
      				<li class="dropdown" id="producto">
      					<a class="dropdown-toggle" data-toggle="dropdown" href="">Productos
      					<span class="caret"></span></a>
      					<ul class="dropdown-menu">
                  <li><a href="index.php?pag=8">Producto</a></li>
                  <li><a href="index.php?pag=11">Compra</a></li>
      						<li><a href="index.php?pag=16">Ultimo Movimiento</a></li>
      					</ul>
      				</li>
      				<li class="dropdown" id="consulta">
      					<a class="dropdown-toggle" data-toggle="dropdown" href="">Informes
      					<span class="caret"></span></a>
      					<ul class="dropdown-menu">
      						<li><a href="index.php?pag=36">Compras</a></li>
      						<li><a href="index.php?pag=37">Ventas</a></li>
      						<li><a href="index.php?pag=38">Devolucion</a></li>
      						<li><a href="index.php?pag=39">Contabilidad</a></li>
      						<li><a href="index.php?pag=34">Existencia</a></li>
      						<li><a href="index.php?pag=35">Servicio Técnico</a></li>
      					</ul>
      				</li>
      				<li><a href="index.php?pag=46"><span class="glyphicon glyphicon-eye-open"></a></li>
    			</ul>
    			<ul class="nav navbar-nav navbar-right">
    				<div class="navbar-brand"><small><strong>User</strong></small></div>
      				<li><a href="index.php?pag=33"><span class="glyphicon glyphicon-user"></span></a></li>
     				<li><a href="vista/vsalir.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
   				</ul>
   			</div>
  		</div>
	</nav>
    <div class="container">
		<?php
			$page = isset($_GET['pag']) ? $_GET['pag'] : NULL;
      if($page == null){
          include 'vista/vhome.php';
      }
      switch($page){
          case 2:
              include 'vista/vproveedor.php';
              break;
          case 3:
              include 'vista/vactuproveedor.php';
              break;
          case 4:
              include 'vista/vempleado.php';
              break;
          case 5:
              include 'vista/vactuempleado.php';
              break;
          case 6:
              include 'vista/vcliente.php';
              break;
          case 7:
              include 'vista/vactucliente.php';
              break;
          case 8:
              include 'vista/vproducto.php';
              break;
          case 9:
              include 'vista/vactuproducto.php';
              break;
          case 10:
              include 'vista/vventa.php';
              break;
          case 11:
              include 'vista/vcompra.php';
              break;
          case 12:
              include 'vista/vcodigo.php';
              break;
          case 13:
              include 'vista/prosesbarcode.php';
              break;
          case 14:
              include 'vista/vservicioentregado.php';
              break;
          case 15:
              include 'vista/vactuservicioentregado.php';
              break;
          case 16:
              include 'vista/vmovimiento.php';
              break;
          case 17:
              include 'vista/vactumovimiento.php';
              break;
          case 18:
              include 'vista/vserviciotecnico.php';
              break;
          case 19:
              include 'vista/vactuserviciotecnico.php';
              break;
          case 34:
              include 'vista/vcsexistencia.php';
              break;
          case 36:
              include 'vista/vcscompra.php';
              break;
          case 37:
              include 'vista/vcsventa.php';
              break;
          case 46:
              include 'vista/vcreditos.php';
              break;
          default:
              include 'vista/vhome.php';
              break;
      }
		?>
    </div>
    <!--Script para control de la tabla-->
			<script type="text/javascript">
				//para buscar en las tablas
				$(document).ready(function() {
				    $('#example').dataTable( {
				        "bPaginate": true,
				        "bLengthChange": true,
				        "bFilter": true,
				        "bSort": false,
				        "bInfo": true,
				        "bAutoWidth": true
				    } );
				} );
			</script>

      <script type="text/javascript">
        $(document).ready(function() {
          $('table.display').DataTable({
            responsive: true,
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No hay registros",
            "info": "Mostrando Página _PAGE_ de _PAGES_",
            "infoEmpty": "No existen registros para mostrar",
            "search": "Buscar:",
            "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              "next": "Siguiente",
              "previous": "Anterior"
             }
           }
          });
        } );
      </script>
</body>
</html>
