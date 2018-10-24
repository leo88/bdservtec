<!--
		* @Version: V1.5 12/08/2016
-->

<?php 
	include 'controlador/cproducto.php'; 
	include 'estilosTablas.php';
?>

<div class="container-fluid lol">
	<div class="eti">Registrar Producto</div>
   	<form class="blanco" action="" method="POST">
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Modelo/Referencia:</label>
   	        <input type="text" class="form-control" name="referencia" maxlength="100" placeholder="Modelo o Referencia" required>
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Tipo de Producto:</label>
   	        <textarea name="descripcion" rows="1" cols="25" class="form-control"  minlength="1" placeholder="Ej: Pantalla, teclado..." maxlength="50" required></textarea>
		</div>
		<div class="form-group col-sm-6 col-sm-6 col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Clase de Dispositivo:</label>
   	        <select name="tipo" class="form-control" required>
                <option value="" selected>Seleccione una Opción</option>
                <option value="1">Original</option>
                <option value="2">Generico</option>
                <option value="3">Otro</option>
           	</select>
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Marca:</label>
   	        <input type="text" class="form-control" name="marca" pattern="[A-z ]{2,20}" title="Solo se permiten letras máximo 20 caracteres" required>
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Precio sugerido de venta:</label>
   	        <div class="input-group">
  						<span class="input-group-addon">$</span>
  						<input type="number" class="form-control" name="precio" placeholder="Valor en pesos" pattern="[0-9]{1,11}" min="0" title="Solo se permite valores validos" required>
						</div>
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Ubicación:</label>
   	        <input type="text" class="form-control" name="ubicacion" maxlength="60" required>
		</div>
			<div class="form-group col-xs-4 col-xs-offset-4 col-sm-6 col-md-6 col-lg-4 col-lg-offset-5"> <br>
         		<button type="submit" class="btn btn-success" value="Insertar">Registrar <span class="glyphicon glyphicon-send"></span></button>
      		</div>
	</form>
</div>
	<?php $consultaproducto = $producto->consultar_producto(); ?>
		<table id="" class="display" cellspacing="0" width="100%">
	  		<thead>
          		<tr>
          		    <th colspan="12">Listado de Productos</th>
          		</tr>
          		<tr>
          		    <th>Código</th>
					<th>Referencia</th>
					<th>Descripción</th>
					<th>Tipo</th>
					<th>Marca</th>
					<th>Precio</th>
					<th>Ubicación</th>
					<th>Edición</th>
          		</tr>
       		</thead>
       		<tbody>
        		<?php for($i=0;$i<count($consultaproducto);$i++): ?>
				<tr>
					<td data-title='Código'><?= $consultaproducto[$i]['idcodigo'] ?></td>
					<td data-title='Referencia'><?= $consultaproducto[$i]['referencia'] ?></td>
					<td data-title='Descripcion'><?= $consultaproducto[$i]['descripcion'] ?></td>
					<td data-title='Tipo'><?= $consultaproducto[$i]['tipo'] ?></td>
					<td data-title='Marca'><?= $consultaproducto[$i]['marca'] ?></td>
					<td data-title='Precio'>$ <?= number_format($consultaproducto[$i]['precio']) ?></td>
					<td data-title='Ubicacion'><?= $consultaproducto[$i]['ubicacion'] ?></td>
          			<td data-title='Edición'><a href="index.php?pag=9&id=<?= $consultaproducto[$i]['idcodigo'] ?>" class="btn btn-default">Edit <span class="glyphicon glyphicon-edit"></span></a></td>
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
<br/><br/>
<!--
	* Selector en la barra del menú
-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".nav li").removeClass("active");//this will remove the active class from previously active menu item
        $('#producto').addClass('active');
    });
</script>
