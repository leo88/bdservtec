<!--
	* version: 1.3 28/07/2016
-->

<body class="fondo">
	<div class="edit">

		<?php include 'controlador/cproveedor.php'; ?>
			<div class="eti">Editar Proveedor</div>

			<form action="proveedor&<?= $idprovee?>" method="POST">
				<div class="form-group col-md-6 col-lg-6">
		            <label for=""><span style="color:red;">* </span>Identificacion proveedor:</label>
					<input type="text" class="form-control" name="idproveedor" value="<?= $consultaedit[0]['idproveedor'] ?>" readonly>
					<input type="hidden" name="idprovee" value="<?= $idprovee ?>">
		            <input type="hidden" name="actu" value="actu">
				</div>
				<div class="form-group col-md-6 col-lg-6">
					<label for=""><span style="color:red;">* </span>Nombre proveedor:</label>
		            <input type="text" class="form-control" name="nombre"  value="<?= $consultaedit[0]['nombre']  ?>" maxlength="150" readonly>
				</div>
				<div class="form-group col-md-6 col-lg-6">
					<label for="">contacto:</label>
		            <input type="text" class="form-control" name="contacto" value="<?= $consultaedit[0]['contacto'] ?>" maxlength="100">
				</div>
				<div class="form-group col-md-6 col-lg-6">
					<label for="">Telefono proveedor:</label>
		            <input type="number" class="form-control" name="telefono" value="<?= $consultaedit[0]['telefono']  ?>" pattern="[0-9]{7,20}" maxlength="20" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 20 caracteres" required>
				</div>
				<div class="form-group col-md-6 col-lg-6">
					<label for="">Telefono contacto:</label>
		            <input type="number" class="form-control" name="telefono2"  value="<?= $consultaedit[0]['telefono2']  ?>" pattern="[0-9]{7,20}" maxlength="20" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 20 caracteres">
				</div>
				<div class="form-group col-md-6 col-lg-6">
					<label for="">Dirección:</label>
		            <input type="text" class="form-control" name="direccion" value="<?= $consultaedit[0]['direccion'] ?>" maxlength="100">
				</div>
				<div class="form-group col-md-6 col-lg-6">
					<label for="">Email:</label>
		            <input type="email" class="form-control" name="email" value="<?= $consultaedit[0]['email'] ?>" maxlength="100">
				</div>
				<div class="form-group col-md-6 col-lg-6">
					<br>
		            <button type="submit" class="btn btn-success">Editar <span class="glyphicon glyphicon-transfer"></span></button>
					<a href="proveedor" class="btn btn-success">Volver <span class="glyphicon glyphicon-step-backward"></span></a>
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
