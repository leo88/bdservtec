<body class="fondo">
    <div class="edit">

<?php include("controlador/cempleado.php"); ?>
	<div class="eti">Editar Empleado</div>

	<form action="index.php?pag=4&id=<?= $idemple?>" method="POST">
		<div class="form-group col-md-6 col-lg-6">
            <label for=""><span style="color:red;">* </span>Cédula de Ciudadania:</label>
            <input type="text" class="form-control" name="idempleado" value="<?= $consultaedit[0]['idempleado'] ?>" readonly>
			<input type="hidden" name="idemple" value="<?= $idemple ?>">
            <input type="hidden" name="actu" value="actu">
		</div>
		<div class="form-group col-md-6 col-lg-6">
			<label for=""><span style="color:red;">* </span>Nombre del empleado:</label>
            <input type="text" class="form-control" name="nombre"  value="<?= $consultaedit[0]['nombre']  ?> " pattern="[A-z ]{2,50}" title="Solo se permiten letras máximo 50 caracteres" readonly>
		</div>
		<div class="form-group col-md-6 col-lg-6">
			<label for=""><span style="color:red;">* </span>Dirección del empleado:</label>
            <input type="text" class="form-control" name="direccion" value="<?= $consultaedit[0]['direccion']  ?>" maxlength="50" required>
		</div>
		<div class="form-group col-md-6 col-lg-6">
			<label for=""><span style="color:red;">* </span>Teléfono del empleado:</label>
            <input type="text" class="form-control" name="telefono" value="<?= $consultaedit[0]['telefono'] ?>" pattern="[0-9]{5,10}" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 20 caracteres" required>
		</div>
		<div class="form-group col-md-6 col-lg-6">
			<label for="">Email:</label>
            <input type="email" class="form-control" name="email" value="<?= $consultaedit[0]['email'] ?>" maxlength="70">
		</div>
		<div class="form-group col-md-6 col-lg-6">
            <label for=""><span style="color:red;">* </span>Estado:</label>
            <input type=text class="form-control" list="estado" name="estado" value="<?= $consultaedit[0]['estado']  ?>"required>
                <datalist id="estado">
                   <option> Activo </option>
                   <option> Inactivo </option>
                </datalist>
                Escribir Inactivo en caso de que el empleado no este laborando
		</div>
		<div class="form-group col-lg-12">
            <input type="submit" class="btn btn-success" value="Editar">
			<a href="index.php?pag=4"class="btn btn-success">Volver</a>
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
