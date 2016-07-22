<!--
		* version: 1.0 22/07/2016
-->

<body class="fondo">
<div class="edit">
<?php include 'controlador/cproducto.php'; ?>
	<div class="eti">Generador Codigo de Barras</div>
	<form action="vista/prosesbarcode.php" method="POST">
		<div class="form-group col-lg-6 offset-lg-4"><br>
			<input type="hidden" class="form-control" name="bar" value="<?= $consultaedit[0]['idcodigo'] ?>" readonly>
    	<input type="submit" class="btn btn-success" value="Generar codigo de barras">
			<a href="index.php?pag=8" class="btn btn-success">Volver</a>
        </div>
	</form>
  </div>
</body>
