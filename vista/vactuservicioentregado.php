<body class="fondo">
    <div class="edit">

<?php include("controlador/cservicioentregado.php"); ?>
	<div class="eti">Editar Servicio Tecnico</div>

	<form action="index.php?pag=14&id=<?= $numero_orden?>" method="POST">
		<div class="form-group col-lg-6">
            <label for="">Costo:</label>
			<input type="number" class="form-control" name="costo" value="<?= $consultaedit[0]['costo'] ?>" pattern="[0-9]{1,11}" min="0" title="Solo se permiten numeros, máximo 11" required>
			<input type="hidden" name="numero_orden" value="<?= $numero_orden ?>">
            <input type="hidden" name="actu" value="actu">
		</div>
		<div class="form-group col-lg-6">
			<label for="">Tecnico encargado:</label>
			<input type="text" class="form-control" name="tecnico" value="<?= $consultaedit[0]['tecnico']  ?>" pattern="[A-z ]{2,50}" title="Solo se permiten letras máximo 50 caracteres" required>
		</div>
    <div class="form-group col-lg-6">
      <label for=""><span style="color:red;">* </span>Estado:</label>
      <select name="estado" class="form-control" required>
             <option value="" selected><?= $consultaedit[0]['estado']  ?></option>
             <option value="1">Reparado</option>
             <option value="2">No reparado</option>
             <option value="3">Entregado a peticion</option>
     </select>
    </div>
		<div class="form-group col-lg-6"><br>
            <input type="submit" class="btn btn-success" value="Editar">
			<a href="index.php?pag=14" class="btn btn-success">Volver</a>
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
