<?php include("controlador/cproducto.php"); ?>

<div class="container-fluid lol">
	<div class="eti">Producto</div>
   	<form class="blanco" action="" method="POST">
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Proveedor:</label>
   	        <input type="hidden" class="form-control" name="fechaingreso" value="<?php echo date('Y-m-d'); ?>"  required> 
   	        <select name="idproveedor" class="form-control" >
				<option value=0>Seleccione proveedor</option>
				<?php for($j=0;$j<count($proveedor2);$j++): ?>
					<option value="<?= $proveedor2[$j]['idproveedor'] ?>"><?= $proveedor2[$j]['nombre'] ?></option>
				<?php endfor; ?>
			</select> 
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Referencia:</label>
   	        <input type="text" class="form-control" name="referencia" maxlength="100" required> 
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Descripción:</label>
   	        <textarea name="descripcion" rows="1" cols="25" class="form-control"  minlength="1" maxlength="100" required></textarea>        
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Tipo de Dispositivo:</label>
   	        <select name="tipo" class="form-control" required>
                <option value="" selected>Seleccione una Opción</option>
                <option value="1">Original</option>
                <option value="2">Generico</option>
                <option value="3">Otra</option>
           	</select>           
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Marca:</label>
   	        <input type="text" class="form-control" name="marca" pattern="[A-z ]{2,50}" title="Solo se permiten letras máximo 50 caracteres" required>          
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Cantidad:</label>
   	        <input type="number" class="form-control" name="cantidad" pattern="[0-9]{0,11}" title="Solo se permite numeros validos" min="0" required>      
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Costo:</label>
   	        <div class="input-group">
  				<span class="input-group-addon">$</span>
  				<input type="number" id="moneda" class="form-control" name="costo" placeholder="Valor en pesos" pattern="[0-9]{0,11}" min="0" title="Solo se permite valores validos" required>
			</div>       
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Precio:</label>
   	        <div class="input-group">
  				<span class="input-group-addon">$</span>
  				<input type="number" class="form-control" name="precio" placeholder="Valor en pesos" pattern="[0-9]{1,11}" min="0" title="Solo se permite valores validos" required>
			</div>      
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Ubicación:</label>
   	        <input type="text" class="form-control" name="ubicacion" maxlength="60" required>      
		</div>
			<div class="form-group col-xs-4 col-xs-offset-4 col-sm-6 col-md-6 col-lg-4 col-lg-offset-5"> <br>
         		<button type="submit" class="btn btn-success" value="Insertar">Registrar <span class="icon-checkmark"></span></button>
      		</div>
	</form>
</div>
	<?php $consultaproducto = $producto->consultar_producto(); ?>
		<div id='no-more-tables'>
			<table class="table table-bordered table-hover" id="example">
	  		<thead>
          		<tr>
          		    <th colspan="12">Listado de Productos</th>
          		</tr>
          		<tr>
          		    <th>Código</th>
					<th>Proveedor</th>
					<th>Fecha de Ingreso</th>
					<th>Referencia</th>
					<th>Descripción</th>
					<th>Tipo</th>
					<th>Marca</th>
					<th>Cantidad</th>
					<th>Costo</th>
					<th>Subtotal</th>
					<th>Precio</th>
					<th>Ubicación</th>
					<th>Edición</th>
          		</tr>
       		</thead>
       		<tbody>
        		<?php for($i=0;$i<count($consultaproducto);$i++): 
        			$proveedor1 = $producto->sel_proveedor1($consultaproducto[$i]['idproveedor']);
        		?>
				<tr>
					<td data-title='Código'><?= $consultaproducto[$i]['idcodigo'] ?></td>
					<td data-title='Proveedor'><?= $proveedor1[0]['nombre'] ?></td>
					<td data-title='Fecha de Ingreso'><?= $consultaproducto[$i]['fechaingreso'] ?></td>
					<td data-title='Referencia'><?= $consultaproducto[$i]['referencia'] ?></td>
					<td data-title='Descripcion'><?= $consultaproducto[$i]['descripcion'] ?></td>
					<td data-title='Tipo'><?= $consultaproducto[$i]['tipo'] ?></td>
					<td data-title='Marca'><?= $consultaproducto[$i]['marca'] ?></td>
					<td data-title='Cantidad'><?= $consultaproducto[$i]['cantidad'] ?></td>
					<td data-title='Costo'>$ <?= number_format($consultaproducto[$i]['costo']) ?></td>
					<td data-title='Subtotal'>$ <?= number_format($consultaproducto[$i]['subtotal']) ?></td>
					<td data-title='Precio'>$ <?= number_format($consultaproducto[$i]['precio']) ?></td>
					<td data-title='Ubicacion'><?= $consultaproducto[$i]['ubicacion'] ?></td>
                    <td data-title='Edición'><a href="index.php?pag=9&id=<?= $consultaproducto[$i]['idcodigo'] ?>" class="btn btn-primary"><span class="icon-pencil2"></span></a></td>
					<!--<td>
						<form action="" method="POST" onSubmit="return confirm('Desea eliminar el registro!');">
							<input type="hidden" name="idproveeli" value="<?= $consultaproducto[$i]['idproducto'] ?>">
							<input type="submit" class="btn btn-danger" value="Eliminar">
						</form>
					</td>-->
				</tr>
				<?php endfor; ?>
        	</tbody>
			</table>
		</div>
	</div><!--/row-->
<br/><br/>   
<script type="text/javascript">
    $(document).ready(function () {
        $(".nav li").removeClass("active");//this will remove the active class from  
                                            //previously active menu item 
        $('#producto').addClass('active');
    });
</script>