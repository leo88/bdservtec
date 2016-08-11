
<!-- inicio movimiento -->
<?php include 'controlador/cmovimiento.php'; ?>

<div class="container-fluid lol">
	<form action="" method="POST" class="blanco">
		<div class="form-group campo col-md-3">
           	<input type="hidden" name="motivo" value="Compra" required>
           	<input type="hidden" name="idgeneral" value="<?= $idgeneral3[0]['numero_compra'] ?>">
            <label for=""><span style="color:red;">* </span>idcodigo:</label><br>
     <select name="idcodigo" class="chzn-select form-control">
				<option value=0>Seleccione producto</option>
				<?php for($i=0;$i<count($idcodigo2);$i++): ?>
					<option value="<?= $idcodigo2[$i]['idcodigo'] ?>">
					<?= $idcodigo2[$i]['idcodigo'] ?></option>
				<?php endfor; ?>
			</select>
		</div>
		<div class="form-group campo col-md-3">
            <label for="">Motivo:</label>
            <input type="text" class="form-control" list="descripcion" name="motivo" required>
                <datalist id="descripcion" >
                   <option> Compra
                   <option> Venta
                </datalist>
		</div>
		<div class="form-group campo col-md-3">
            <label for=""><span style="color:red;">* </span>Cantidad:</label>
            <input type="number" class="form-control" name="cantidad" pattern="[0-9]{1,9}" min="0" title="Solo validos numeros" required>
		</div>
		<div class="form-group campo col-md-3">
           <label for=""><span style="color:red;">* </span>Valor:</label>
          <div class="input-group">
              <span class="input-group-addon">$</span>
              <input type="number" class="form-control" name="valor" pattern="[0-9]{0,11}" min="0" title="Solo se permiten numeros, máximo 11" required>
          </div>
		</div>
        <div class="form-group campo col-md-2"><br>
					 <input type="submit" name="Entra" class="btn btn-success" value="+">
            <input type="submit" name="Sale"  class="btn btn-danger"  value="-">
        </div>
	</form>
</div>
<?php $consultamovimiento = $movimiento->consultar_movimiento_c($idgeneral3[0]['numero_compra']); ?>
    <div id=''>
		<table class="table">
		<thead>
            <tr>
                <th colspan="12">Ultimo movimiento por compra</th>
            </tr>
            <tr>
        <th>ID</th>
        <th>ID Venta</th>
				<th>Motivo</th>
				<th>idcodigo</th>
				<th>Cantidad</th>
				<th>Valor</th>
				<th>Edición</th>
				<!--<th>Eliminación</th>-->
            </tr>
        </thead>
        <tbody>
         <?php for($i=0;$i<count($consultamovimiento);$i++): ?>
				<tr>
					<td><?= $consultamovimiento[$i]['idmovimiento'] ?></td>
					<td><?= $consultamovimiento[$i]['idgeneral'] ?></td>
					<td><?= $consultamovimiento[$i]['motivo'] ?></td>
					<td><?= $consultamovimiento[$i]['idcodigo'] ?></td>
					<td><?= $consultamovimiento[$i]['cantidad'] ?></td>
					<td>$ <?= number_format($consultamovimiento[$i]['valor']) ?></td>
					<td><a href="index.php?pag=17&id=<?= $consultamovimiento[$i]['idmovimiento'] ?>" class="btn btn-primary">Editar <span class="glyphicon glyphicon-edit"></span></a></td>
					<!--<td>
						<form action="" method="POST" onSubmit="return confirm('Desea eliminar el registro!');">
							<input type="hidden" name="idmovimientoeli" value="<?= $consultamovimiento[$i]['idmovimiento'] ?>">
							<input type="submit" class="btn btn-danger" value="Eliminar">
						</form>
					</td>-->
				</tr>
			<?php endfor; ?>
        </tbody>
	</table>
	</div>
<!-- final movimiento -->
<br/><br/>
