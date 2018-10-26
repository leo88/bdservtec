<body class="fondo">        
    <div class="edit">
                        	
<?php include("controlador/cvendedor.php"); ?>
	<div class="eti">Editar Vendedor</div>

	<form action="index.php?pag=4&id=<?= $idvende?>" method="POST">
		<div class="form-group col-md-6 col-lg-6">
            <label for=""><span style="color:red;">* </span>Cédula de Ciudadania:</label>
            <input type="text" class="form-control" name="idvendedor" value="<?= $consultaedit[0]['idvendedor'] ?>" readonly>
			<input type="hidden" name="idvende" value="<?= $idvende ?>">
            <input type="hidden" name="actu" value="actu">
		</div>
		<div class="form-group col-md-6 col-lg-6">
			<label for=""><span style="color:red;">* </span>Nombre Completo:</label>
            <input type="text" class="form-control" name="nombre"  value="<?= $consultaedit[0]['nombre']  ?> " pattern="[A-z ]{2,100}" title="Solo se permiten letras máximo 100 caracteres" required>
		</div>
		<div class="form-group col-md-6 col-lg-6">
			<label for="">Dirección residencia:</label>
            <input type="text" class="form-control" name="direccion" value="<?= $consultaedit[0]['direccion'] ?>" maxlength="100">
		</div>
		<div class="form-group col-md-6 col-lg-6">
			<label for=""><span style="color:red;">* </span>Teléfono:</label>
            <input type="text" class="form-control" name="telefono" value="<?= $consultaedit[0]['telefono']  ?>" pattern="[0-9]{7,10}" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 10 caracteres" required>
		</div>
		<div class="form-group col-md-6 col-lg-6">
			<label for="">Email:</label>
            <input type="email" class="form-control" name="email"  value="<?= $consultaedit[0]['email']  ?>" maxlength="100">
		</div>
		<div class="form-group col-md-6 col-lg-6">
            <label for=""><span style="color:red;">* </span>Estado:</label>
   	            <select name="estado" class="form-control" required>
                    <option value="<?= $consultaedit[0]['estado']  ?>" selected><?= $consultaedit[0]['estado']  ?></option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
            	</select>  
                Escribir Inactivo en caso de que el empleado no este laborando      
		</div>
		<div class="form-group col-lg-6">
            <input type="submit" class="btn btn-success" value="Guardar cambios">
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