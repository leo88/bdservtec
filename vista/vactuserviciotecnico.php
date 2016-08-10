<!--
		* version: 1.0 10/08/2016
-->

<body class="fondo">        
    <div class="edit">                  	

<?php include 'controlador/cserviciotecnico.php'; ?>
	<div class="eti">Editar Servicio Tecnico</div>

	<form action="home.php?pag=18&id=<?= $numero_orden?>" method="POST">
		<div class="form-group col-lg-6">
            <label for="">Tipo de Dispositivo:</label>
			<input type="text" class="form-control" name="dispositivo" value="<?= $consultaedit[0]['nombre'] ?>" pattern="[A-z ]{2,50}" title="Solo se permiten letras máximo 50 caracteres" required>
			<input type="hidden" name="numero_orden" value="<?= $numero_orden ?>">
            <input type="hidden" name="actu" value="actu">
		</div>
		<div class="form-group col-lg-6">
			<label for="">Marca:</label>
			<input type="text" class="form-control" name="marca" value="<?= $consultaedit[0]['marca']  ?>" pattern="[A-z ]{2,20}" title="Solo se permiten letras máximo 20 caracteres" required>
		</div>
		<div class="form-group col-lg-6">
			<label for="">Referencia:</label>
			<input type="text" class="form-control" name="referencia" value="<?= $consultaedit[0]['referencia'] ?>" maxlength="20" required>
		</div>
		<div class="form-group col-lg-6">
			<label for="">Descripcion Servicio:</label>
			<input type="text" class="form-control" name="descripcion_st" value="<?= $consultaedit[0]['descripcion_st'] ?>" maxlength="100" required>
		</div>
		<div class="form-group col-lg-6">
			<label for="">Observacion:</label>
			<input type="text" class="form-control" name="observacion" value="<?= $consultaedit[0]['observacion'] ?>" maxlength="50">
			<input type="hidden" class="form-control" name="fecha" value="<?= $consultaedit[0]['fecha']  ?>" required>
            <input type="hidden" class="form-control" name="id_cliente" value="<?= $consultaedit[0]['id_cliente']  ?>">
            <input type="hidden" class="form-control" name="empleado" value="<?= $consultaedit[0]['empleado']  ?>">
		</div>
		<div class="form-group col-lg-6">
			<label for="">Fecha:</label>
            
		</div>
		<div class="form-group col-lg-6"><br>
            <input type="submit" class="btn btn-success" value="Editar">
			<a href="index.php?pag=18" class="btn btn-success">Volver</a>
        </div>
	</form>
    </div> 		
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $(".nav li").removeClass("active");//this will remove the active class from  
                                            //previously active menu item 
        $('#st').addClass('active');
    });
</script>