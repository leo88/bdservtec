<body class="fondo"> 
<div class="edit">
                        	
<?php include("controlador/cproducto.php"); ?>
	<div class="eti">Editar producto</div>

	<form action="index.php?pag=2&id=<?= $idproducto?>" method="POST">
		<div class="form-group col-md-6 col-lg-6">
            <label for=""><span style="color:red;">* </span>Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="<?= $consultaedit[0]['nombre'] ?>" pattern="[A-z ]{2,50}" title="Solo se permiten letras máximo 50 caracteres" required>
			<input type="hidden" name="idproducto" value="<?= $idproducto ?>">
            <input type="hidden" name="actu" value="actu">
		</div>
		<div class="form-group col-md-6 col-lg-6">
			<label for="">Teléfono:</label>
            <input type="text" class="form-control" name="telefono" value="<?= $consultaedit[0]['telefono']  ?>" pattern="[0-9]{7,20}" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 20 caracteres">
		</div>
		<div class="form-group col-md-6 col-lg-6">
			<label for="">Dirección:</label>
            <input type="text" class="form-control" name="direccion" value="<?= $consultaedit[0]['direccion']  ?>" maxlength="50">
		</div>
		<div class="form-group col-md-6 col-lg-6">
			<label for="">Email:</label>
            <input type="text" class="form-control" name="email" value="<?= $consultaedit[0]['email']  ?>" maxlength="30">
		</div>		
		<div class="form-group col-md-6 col-lg-6">
			<label for=""><span style="color:red;">* </span>Detalle:</label>
            <select name="detalle" class="form-control" required>
                    <option value="<?= $consultaedit[0]['detalle'] ?>" selected><?= $consultaedit[0]['detalle'] ?></option>
                    <option value="1">producto</option>
                    <option value="2">Local</option>
            </select>        
		</div>	
		<div class="form-group col-md-6 col-lg-6"><br>
            <input type="submit" class="btn btn-success" value="Editar">
			<a href="index.php?pag=2" class="btn btn-success">Volver</a>
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