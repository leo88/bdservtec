<!--
		* version: 1.0 21/07/2016
-->

<body class="fondo">
<div class="edit">

<?php include 'controlador/cproducto.php'; ?>
	<div class="eti">Editar Producto</div>

	<form action="index.php?pag=8&id=<?= $idcodigo?>" method="POST">
         <div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>referencia:</label>
   	        <input type="text" class="form-control" name="referencia" value="<?= $consultaedit[0]['referencia']  ?>"
   	         maxlength="100" required>
            <input type="hidden" class="form-control" name="tipo" value="<?= $consultaedit[0]['tipo']  ?>">
			      <input type="hidden" name="idcod" value="<?= $idcodigo ?>">
            <input type="hidden" name="actu" value="actu">
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Clase de dispositivo:</label>
   	        <input type="text" class="form-control" name="descripcion" value="<?= $consultaedit[0]['descripcion']  ?>" maxlength="50" required>
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Marca:</label>
   	        <input type="text" class="form-control" name="marca" value="<?= $consultaedit[0]['marca']  ?>" pattern="[A-z ]{2,50}" title="Solo se permiten letras máximo 50 caracteres" required>
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Precio:</label>
   	        <div class="input-group">
  				<span class="input-group-addon">$</span>
  				<input type="number" class="form-control" name="precio" value="<?= $consultaedit[0]['precio']  ?>" placeholder="Valor en pesos" pattern="[0-9]{1,11}" min="0" title="Solo se permite valores validos" required>
			</div>
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Ubicación:</label>
   	        <input type="text" class="form-control" name="ubicacion" value="<?= $consultaedit[0]['ubicacion']  ?>" maxlength="60" required>
		</div>
		<div class="form-group col-md-6 col-lg-6"><br>
            <input type="submit" class="btn btn-success" value="Editar">
			<a href="index.php?pag=8" class="btn btn-success">Volver</a>
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
