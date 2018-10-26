<!--
		* @Version: V1.1 12/08/2016
-->

<body class="fondo">
<div class="edit">

<?php include 'controlador/ccliente.php'; ?>
	<div class="eti">Editar Cliente</div>

	<form action="cliente&id=<?= $idcliente?>" method="POST">
		<div class="form-group col-md-6 col-lg-4">
            <label for=""><span style="color:red;">* </span>Nombre Cliente:</label>
            <input type="text" class="form-control" name="nombre" value="<?= $consultaedit[0]['nombre'] ?>" maxlength="100" required>
						<input type="hidden" name="idcliente" value="<?= $idcliente ?>">
						<input type="hidden" name="detalle" value="<?= $consultaedit[0]['detalle'] ?>">
            <input type="hidden" name="actu" value="actu">
		</div>
		<div class="form-group col-md-6 col-lg-4">
			<label for="">Teléfono:</label>
            <input type="text" class="form-control" name="telefono" value="<?= $consultaedit[0]['telefono']  ?>" pattern="[0-9]{7,20}" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 20 caracteres">
		</div>
		<div class="form-group col-md-6 col-lg-4"><br>
            <button type="submit" class="btn btn-success">Guardar cambios <span class="glyphicon glyphicon-transfer"></span></button>
			<a href="cliente" class="btn btn-success">Volver <span class="glyphicon glyphicon-step-backward"></span></a>
        </div>
	</form>
   </div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $(".nav li").removeClass("active");//this will remove the active class from
                                            //previously active menu item
        $('#registrar').addClass('active');
    });
</script>
