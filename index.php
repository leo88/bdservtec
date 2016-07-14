<!DOCTYPE html>
<html lang="en">
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
      			<a class="navbar-brand active" href="index.php">Wold Comunicaciones</a>
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
      						<li><a href="index.php?pag=8">Producto</a></li>
      						<li><a href="index.php?pag=10">Venta</a></li>
      						<li><a href="index.php?pag=12">Clientes</a></li>
      					</ul>
      				</li>
      				<li class="dropdown" id="venta">
      					<a class="dropdown-toggle" data-toggle="dropdown" href="">Venta
      					<span class="caret"></span></a>
      					<ul class="dropdown-menu">
      						<li><a href="index.php?pag=16">Movimiento</a></li>
      						<li><a href="index.php?pag=26">Venta por Producto</a></li>
      						<li><a href="index.php?pag=24">Ventas</a></li>
                  <li><a href="index.php?pag=44">Movimiento</a></li>
                </ul>
      				</li>
      				<li class="dropdown" id="st">
      					<a class="dropdown-toggle" data-toggle="dropdown" href="">Servicio Técnico
      					<span class="caret"></span></a>
      					<ul class="dropdown-menu">
      						<li><a href="index.php?pag=13">Registro del Servicio</a></li>
      						<li><a href="index.php?pag=15">Servicio Tecnico Entregado</a></li>
      					</ul>
      				</li>
      				<li class="dropdown" id="producto">
      					<a class="dropdown-toggle" data-toggle="dropdown" href="">Productos
      					<span class="caret"></span></a>
      					<ul class="dropdown-menu">
      						<li><a href="index.php?pag=3">Producto</a></li>
      						<li><a href="index.php?pag=7">Proveedor</a></li>
      						<li><a href="index.php?pag=19">Compra</a></li>
      						<li><a href="index.php?pag=16">Movimiento</a></li>
      						<li><a href="index.php?pag=20">Compra por Producto</a></li>
      						<li><a href="index.php?pag=21">Reposición</a></li>
      						<li><a href="index.php?pag=18">Devolución</a></li>
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
          include("vista/vhome.php");
      }
			if ($page == 2)
			{
                include("vista/vproveedor.php");
			}
            if ($page == 3)
			{
                include("vista/vactuproveedor.php");
			}
            if ($page == 4)
			{
                include("vista/vvendedor.php");
			}
            if ($page == 5)
			{
                include("vista/vactuvendedor.php");
			}
            if ($page == 6)
			{
                include("vista/vcliente.php");
			}
            if ($page == 7)
			{
                include("vista/vactucliente.php");
			}
            if ($page == 8)
			{
                include("vista/vproducto.php");
			}
            if ($page == 9)
			{
                include("vista/vactuproducto.php");
			}
            if ($page == 10)
			{
                include("vista/vventa.php");
			}
             if ($page == 11)
			{
                include("vista/vactuventa.php");
			}
            if ($page == 12)
			{
                include("vista/vactuotros.php");
			}
            if ($page == 13)
			{
                include("vista/vserviciotecnico.php");
			}
            if ($page == 14)
			{
                include("vista/vactuserviciotecnico.php");
			}
            if ($page == 15)
			{
                include("vista/vservicioentregado.php");
			}
            if ($page == 16)
			{
                include("vista/vmovimiento.php");
			}
            if ($page == 17)
			{
                include("vista/vactumovimiento.php");
			}
            if ($page == 18)
			{
                include("vista/vdevolucion.php");
			}
			 if ($page == 19)
			{
                include("vista/vcompra.php");
			}
            if ($page == 20)
			{
                include("vista/vcompraproduc.php");
			}
            if ($page == 21)
			{
                include("vista/vreposicion.php");
			}
            if ($page == 22)
			{
                include("vista/vactucliente.php");
			}
            if ($page == 23)
			{
                include("vista/vactucompraproduc.php");
			}
			if ($page == 24)
			{
                include("vista/vventa.php");
			}
            if ($page == 25)
			{
                include("vista/vactuventa.php");//no esta creado
			}
			if ($page == 26)
			{
                include("vista/vventaproduc.php");
			}
            if ($page == 27)
			{
                include("vista/vactuventaproduc.php");
			}
			if ($page == 28)
			{
                include("vista/vactudevolucion.php");
			}
			if ($page == 29)
			{
                include("vista/vminutosvalor.php");
			}
			if ($page == 30)
			{
                include("vista/vactuminutosvalor.php");
			}
			if ($page == 31)
			{
                include("vista/vrecargas.php");
			}
			if ($page == 32)
			{
                include("vista/vacturecargas.php");
			}
            if ($page == 33)
            {
                include("vista/vusuario.php");
            }
      if ($page == 34)
      {
                include("vista/vcsexistencia.php");
      }
      if ($page == 35)
      {
                include("vista/vcsst.php");
      }
      if ($page == 36)
      {
                include("vista/vcscompra.php");
      }
      if ($page == 37)
      {
                include("vista/vcsventa.php");
      }
      if ($page == 38)
      {
                include("vista/vcsdevolucion.php");
      }
      if ($page == 39)
      {
                include("vista/vcscontabilidad.php");
      }
      if ($page == 40)
      {
                include("vista/vrecibo.php");
      }
      if ($page == 41)
      {
                include("vista/vcodigo.php");
      }
      if ($page == 42)
      {
                include("vista/prosesbarcode.php");
      }
      if ($page == 43)
      {
                include("vista/vtiquete.php");
      }
      if ($page == 44)
      {
                include("vista/vmovi.php");
      }
      if ($page == 45)
      {
                include("vista/vactumovi.php");
      }
       if ($page == 46)
      {
                include("vista/vcreditos.php");
      }
      if ($page == 47)
      {
                include("vista/prosesbarcode.php");
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
