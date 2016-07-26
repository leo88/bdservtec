<body class="fondo">
   	<div class="edit">
   	<?php include("controlador/cmovimiento.php"); ?>

	<div class="eti">Editar Movimiento</div>
	<form action="index.php?pag=16&id=<?= $idmovimiento?>" method="POST">
	    <div class="form-group col-sm-6 col-md-6 col-lg-6">
            <label for=""><span style="color:red;">* </span>Codigo:</label>
            <input type="text" class="form-control" name="idcodigo" value="<?= $consultaedit[0]['idcodigo'] ?>" readonly required>
            <input type="hidden" name="motivo" value="<?= $consultaedit[0]['motivo'] ?>">
			<input type="hidden" name="idmovimiento" value="<?= $idmovimiento ?>">
			<input type="hidden" name="idgeneral" value="<?= $consultaedit[0]['idgeneral'] ?>">
            <input type="hidden" name="actu" value="actu">
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-6">
			<label for=""><span style="color:red;">* </span>Cantidad:</label>
            <input type="number" class="form-control" name="cantidad" value="<?= $consultaedit[0]['cantidad']  ?>" required>
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-6">
           	<label for=""><span style="color:red;">* </span>Valor:</label>
           	<div class="input-group">
              <span class="input-group-addon">$</span>
              <input type="number" class="form-control" name="valor" pattern="[0-9]{0,11}" min="0" title="Solo se permiten numeros, máximo 11" value="<?= $consultaedit[0]['valor'] ?>" required>
          </div>
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-6"><br>
            <input type="submit" class="btn btn-success" value="Editar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="index.php?pag=16" class="btn btn-primary"><span class="glyphicon glyphicon-transfer"></span> Volver movimiento</a>
            <a href="home.php?pag=24" class="btn btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span> Volver venta</a>
        </div>
	</form>
	</div>
</body>
