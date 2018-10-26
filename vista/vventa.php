<div class="row-fluid">

<!--
  	* version: 1.6 28/07/2016
-->

<!-- inicio venta -->
  <?php include 'controlador/cventa.php'; ?>

  <?php
  	$displayForm = True;
  	if(isset($_POST['submit']) or isset($_POST['Sale'])){
  		$displayForm = False;
  ?>
  	<!-- Tabla donde se muestra la informacion ingresada -->
    <?php $consultaventa = $venta->consultar_venta(); ?>
    <div id="vt">
				<?php for($j=0;$j<count($consultaventa);$j++):
				$cliente1 	= $venta->sel_cliente1($consultaventa[$j]['idcliente']);
				$empleado1 	= $venta->sel_empleado1($consultaventa[$j]['idempleado']);
			?>
			       <span class="vt1">REGISTRO DE VENTA NO. <?= $consultaventa[$j]['numero_venta'] ?></span>         <br><br>
                   <span class="vt1">Cliente: <?= $cliente1[0]['nombre'] ?></span>
                   <span class="vt1">Fecha: <?= $consultaventa[$j]['fecha'] ?></span>
                   <span class="vt1">Vendedor: <?= $empleado1[0]['nombre'] ?></span>
                    <!--<div><a href="home.php?pag=25&idv=<?= $consultaventa[$j]['numero_venta'] ?>" class="btn btn-primary">Editar</a></div>-->

                <?php endfor; ?>

    </div>

<!-- Script para generar el saldo que queda  por cancelar-->
<script>
    $(function(){
  $('#produc').change(function() {
      selectedOption = $('option:selected', this);
      var a = parseInt($('input[name=valor]').val( selectedOption.data('precio')));
      var b = parseInt($('input[name=desc]').val( selectedOption.data('descripcion')));
      var c = parseInt($('input[name=refe]').val( selectedOption.data('referencia')));
      var d = parseInt($('input[name=mark]').val( selectedOption.data('marca')));
      var f = parseInt($('input[name=tipo]').val( selectedOption.data('tipo')));
  }).change();
  });
</script>

<!-- inicio movimiento -->

<?php include 'controlador/cmovimiento.php'; ?>

<div class="container-fluid lol">
	<form action="" method="POST" class="blanco">
		<div class="col-sm-6 col-md-4 col-lg-4">
          	<input type="hidden" name="motivo" value="Venta" required>
          	<input type="hidden" name="idgeneral" value="<?= $idgeneral2[0]['numero_venta'] ?>">
           	<label for=""><span style="color:red;">* </span>Codigo:</label><br>
            <select name="idcodigo" id="produc" class="chzn-select form-control">
				<option value=0>Seleccione producto</option>
				<?php for($i=0;$i<count($idcodigo2);$i++): ?>
					<option value="<?= $idcodigo2[$i]['idcodigo'] ?>" data-precio="<?= $idcodigo2[$i]['precio'] ?>" data-referencia="<?= $idcodigo2[$i]['referencia'] ?>" data-descripcion="<?= $idcodigo2[$i]['descripcion'] ?>" data-tipo="<?= $idcodigo2[$i]['tipo'] ?>" data-marca="<?= $idcodigo2[$i]['marca'] ?>">
					<?= $idcodigo2[$i]['idcodigo'] ?></option>
				<?php endfor; ?>
			</select>
		</div>
    <div class="form-group col-sm-6 col-md-4 col-lg-4">
           <label for=""><span style="color:red;">* </span>Cantidad:</label>
            <input type="number" class="form-control" name="cantidad" pattern="[0-9]{1,9}" min="0" title="Solo validos numeros" required>
		</div>
    <div class="form-group col-sm-6 col-md-4 col-lg-4">
          <label for=""><span style="color:red;">* </span>Valor Unitario:</label>
          <div class="input-group">
              <span class="input-group-addon">$</span>
              <input type="number" class="form-control" id="price1" name="valor" pattern="[0-9]{0,11}" min="0" title="Solo se permiten numeros, máximo 11" required>
          </div>
		</div>
		<div class="form-group col-sm-6 col-md-3 col-lg-4">
           <label for="">Tipo de Producto:</label>
            <input type="text" class="form-control" name="desc" readonly>
		</div>
		<div class="form-group col-sm-6 col-md-3 col-lg-4">
           <label for="">Modelo/Referencia:</label>
            <input type="text" class="form-control" name="refe" readonly>
		</div>
		<div class="form-group col-sm-6 col-md-3 col-lg-4">
           <label for="">Marca:</label>
            <input type="text" class="form-control" name="mark" readonly>
		</div>
		<div class="form-group col-sm-6 col-md-3 col-lg-4">
           <label for="">Clase de Dispositivo:</label>
            <input type="text" class="form-control" name="tipo" readonly>
		</div>
    <div class="boton">
      <div class="form-group campo"><br>
         <button type="submit" name="Sale" class="btn btn-warning" value="-">incluir articulo <span class="glyphicon glyphicon-shopping-cart"></span></button>
      </div>
    </div>
	</form>
</div>

<?php $consultamovimiento = $movimiento->consultar_movimiento_v($idgeneral2[0]['numero_venta']); ?>
        <div id=''>
			<table class="table blanco">
			<thead>
            <tr>
                <th colspan="12">Ultimo movimiento por venta</th>
            </tr>
            <tr>
				<th>Codigo</th>
				<th>Cantidad</th>
				<th>Valor Unitario</th>
				<th>Subtotal</th>
				<th>Edición</th>
				<!--<th>Eliminación</th>-->
            </tr>
        </thead>
        <tbody>
          <?php for($i=0;$i<count($consultamovimiento);$i++): ?>
				<tr>
					<td><?= $consultamovimiento[$i]['idcodigo'] ?></td>
					<td><?= $consultamovimiento[$i]['cantidad'] * -1 ?></td>
					<td>$ <?= number_format($consultamovimiento[$i]['valor']) ?></td>
					<td>$ <?= number_format($consultamovimiento[$i]['valor'] * ($consultamovimiento[$i]['cantidad'] *-1)) ?></td>
					<td><a href="index.php?pag=17&id=<?= $consultamovimiento[$i]['idmovimiento'] ?>" class="btn btn-default btn-xs">Editar <span class="glyphicon glyphicon-edit"></span></a></td>
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
        <div class="eti">Registrar Venta</div>
        <form action="" method="POST" class="blanco">
		<div class="form-group campo col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <label for=""><span style="color:red;">* </span>Cliente:</label><br>
            <select name="cliente" class="chzn-select form-control" >
				<option value=0>Seleccione cliente</option>
				<?php for($j=0;$j<count($cliente2);$j++): ?>
					<option value="<?= $cliente2[$j]['idcliente'] ?>"><?= $cliente2[$j]['nombre'] ?></option>
				<?php endfor; ?>
			</select>
		</div>
		<div class="form-group campo col-xs-12 col-sm-6 col-md-4 col-lg-3">
           <label for=""><span style="color:red;">* </span>Fecha:</label>
            <input type="date" class="form-control" name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly required>
		</div>
		<div class="form-group campo col-xs-12 col-sm-6 col-md-4 col-lg-3">
           <label for=""><span style="color:red;">* </span>Empleado:</label>
            <select name="empleado" class="form-control" >
				<option value=0>Seleccione empleado</option>
				<?php for($j=0;$j<count($empleado2);$j++): ?>
					<option value="<?= $empleado2[$j]['idempleado'] ?>"><?= $empleado2[$j]['nombre'] ?></option>
				<?php endfor; ?>
			</select>
		</div>
        <div class="form-group campo"> <br>
              <button type="submit" name="submit" class="btn btn-success" value="Insertar"><span class="icon-checkmark">  REGISTRAR VENTA</span></button>
        </div>
	</form>
    </div>
<?php } ?>
<!-- final venta -->
</div>


<div class="col-lg-3 col-md-offset-9">
	<a href="home.php?pag=40" target="_blank" class="btn btn-primary">Vista Impresión <span class="glyphicon glyphicon-print"></span></a>
</div>

<br/><br/><br/>

<div class="row-fluid"><!--spoiler de informacion-->
    <input type="checkbox"  id="spoiler2" />
      <label for="spoiler2" >Acerca de la venta</label>
    <div class="spoiler">
      <div class="info">
              <h5>¿Como realizo una venta?</h5>
               <ul>
                   <li>Ingrese los datos de la venta (Cliente, Fecha y Empleado) y registrelos con el boton <span class="icon-checkmark tama"> REGISTRAR VENTA</span> este paso se realiza una vez por cada venta</li>
                   <li>Ingrese cada producto referente a esa venta (Referencia, Cantidad Valor) y registrarlos con el boton <span class="glyphicon glyphicon-shopping-cart tama2"> INCLUIR ARTICULO</span> este paso se puede repetir varias veces por cada venta</li>
                   <li>Para editar los datos de algun articulo registrado use el boton <span class="glyphicon glyphicon-edit tama3"></span>  (Solo para la ultima venta activa)</li>
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
        $('#venta').addClass('active');
    });
</script>
