<!--
		*  @Version: V1.3 10/08/2016
-->

<div class="row-fluid">
<!-- inicio compra -->
<?php include 'controlador/ccompra.php'; ?>

<?php
  	$displayForm = True;
  	if(isset($_POST['submit']) or isset($_POST['Entra'])){
  		$displayForm = False;
?>
<!-- Tabla donde se muestra la informacion ingresada-->
    <?php $consultacompra = $compra->consultar_compra(); ?>
    <div id="vt">
				<?php for($j=0;$j<count($consultacompra);$j++):
				$proveedor1 = $compra->sel_proveedor1($consultacompra[$j]['proveedor']);
			?>
				  <span class="vt1">REGISTRO DE COMPRA NO. <?= $consultacompra[$j]['numero_compra'] ?></span>         <br><br>
				  <span class="vt1"><?= $consultacompra[$j]['numero_compra'] ?></span>
					<span class="vt1"><?= $proveedor1[0]['nombre'] ?></span>
					<span class="vt1"><?= $consultacompra[$j]['fecha'] ?></span>
				</tr>
			<?php endfor; ?>
	</div>

<!-- Script para generar el saldo que queda  por cancelar-->
<script>
    $(function(){
  $('#cod').change(function() {
      selectedOption = $('option:selected', this);
      var a = parseInt($('input[name=desc]').val( selectedOption.data('descripcion')));
  }).change();
  });
</script>

	<!-- inicio movimiento -->
<?php include 'controlador/cmovimiento.php'; ?>

<div class="container-fluid lol">
	<form action="" method="POST" class="blanco">
		<div class="form-group campo col-lg-3 col-md-3 col-sm-3">
           	<input type="hidden" name="motivo" value="Compra" required>
           	<input type="hidden" name="idgeneral" value="<?= $idgeneral3[0]['numero_compra'] ?>">
            <label for=""><span style="color:red;">* </span>Código Producto:</label><br>
            <select name="idcodigo" id="cod" class="chzn-select form-control">
               <option value=0>Seleccione producto</option>
               <?php for($i=0;$i<count($idcodigo2);$i++): ?>
                 <option value="<?= $idcodigo2[$i]['idcodigo'] ?>" data-descripcion="<?= $idcodigo2[$i]['descripcion'].' '.$idcodigo2[$i]['tipo'].' '.$idcodigo2[$i]['marca'].' '.$idcodigo2[$i]['referencia'] ?>">
                 <?= $idcodigo2[$i]['idcodigo'] ?></option>
               <?php endfor; ?>
             </select>
		</div>
		<div class="form-group campo col-lg-3 col-md-3 col-sm-3">
            <label for=""><span style="color:red;">* </span>Cantidad:</label>
            <input type="number" class="form-control" name="cantidad" pattern="[0-9]{1,9}" min="0" title="Solo validos numeros" required>
		</div>
		<div class="form-group campo col-lg-3 col-md-3 col-sm-3">
           <label for=""><span style="color:red;">* </span>Valor Unitario:</label>
          <div class="input-group">
              <span class="input-group-addon">$</span>
              <input type="number" class="form-control" name="valor" pattern="[0-9]{0,11}" min="0" title="Solo se permiten numeros, máximo 11" required>
          </div>
		</div>
        <div class="form-group campo col-md-2"><br>
           <button type="submit" name="Entra" class="btn btn-warning" value="+"><span class="glyphicon glyphicon-usd"> COMPRAR</span></button>
        </div>
        <div class="form-group campo col-md-4">
           <label for="">Descripción:</label>
            <input type="text" class="form-control" name="desc" readonly>  
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
                <th>ID Compra</th>
				        <th>Cantidad</th>
				        <th>Valor Unitario</th>
                <th>Subtotal</th>
                <th>Código de Barras</th>
				        <th>Edición</th>
				<!--<th>Eliminación</th>-->
            </tr>
        </thead>
        <tbody>
         <?php for($i=0;$i<count($consultamovimiento);$i++): ?>
				<tr>
					<td><?= $consultamovimiento[$i]['idgeneral'] ?></td>
					<td><?= $consultamovimiento[$i]['cantidad'] ?></td>
					<td>$ <?= number_format($consultamovimiento[$i]['valor']) ?></td>
          <td>$ <?= number_format($consultamovimiento[$i]['valor'] * $consultamovimiento[$i]['cantidad']) ?></td>
          <td><a href="index.php?pag=12&id=<?= $consultamovimiento[$i]['idmovimiento'] ?>" class="btn btn-info">Code Bar  <span class="glyphicon glyphicon-barcode"></span></a></td>
					<td><a href="index.php?pag=17&id=<?= $consultamovimiento[$i]['idmovimiento'] ?>" class="btn btn-default">Editar <span class="glyphicon glyphicon-edit"></span></a></td>
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

	<?php
  		}
  		if($displayForm){
  	?>
    <div class="container-fluid lol">
        <div class="eti">Registrar Compra</div>
        <form action="" method="POST" class="blanco">
		<div class="form-group campo col-md-4">
            <label for=""><span style="color:red;">* </span>Proveedor:</label><br>
            <select name="proveedor" class="chzn-select form-control" >
				<option value=0>Seleccione proveedor</option>
				<?php for($j=0;$j<count($proveedor2);$j++): ?>
					<option value="<?= $proveedor2[$j]['idproveedor'] ?>"><?= $proveedor2[$j]['nombre'] ?></option>
				<?php endfor; ?>
			</select>
		</div>
		<div class="form-group campo col-sm-6 col-md-4 col-lg-6">
           <label for=""><span style="color:red;">* </span>Fecha:</label>
            <input type="date" class="form-control" name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly>
		</div>
        <div class="form-group campo col-md-3"> <br>
              <button type="submit" name="submit" class="btn btn-success" value="Insertar"><span class="icon-checkmark"> REGISTRAR COMPRA</span></button>
        </div>
	</form>
    </div>
    <?php } ?>
<!-- final compra -->
 <!--/span-->

		      </div><!--/row-->

<br/><br/>

<div class="row-fluid"><!--spoiler de informacion-->
<input type="checkbox"  id="spoiler2" />
<label for="spoiler2" >Acerca de la compra</label>
<div class="spoiler">
      <div class="info">
              <h5>¿Como realizo una compra?</h5>
                 <ul>
                   <li>Ingrese los datos de la compra (Proveedor y Fecha) y registrelos con el boton <span class="icon-checkmark tama"> REGISTRAR COMPRA</span> este paso se realiza una vez por cada compra</li>
                   <li>Ingrese cada producto referente a esa compra (Referencia, Cantidad Valor) y registrarlos con el boton <span class="glyphicon glyphicon-usd tama2"> COMPRA</span> este paso se puede repetir varias veces por cada compra</li>
                   <li>Para editar los datos de algun articulo registrado use el boton <span class="glyphicon glyphicon-edit tama3"> Editar</span>  (Solo para la ultima compra activa)</li>
               </ul>
         <br><br>
      </div>
    </div>
</div>
<br><br>
<!--
  * Selector en la barra del menú
-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".nav li").removeClass("active");//this will remove the active class from previously active menu item
        $('#producto').addClass('active');
    });
</script>
