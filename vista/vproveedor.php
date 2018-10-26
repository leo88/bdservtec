<!--
		* version: 1.4 10/08/2016
-->

<?php include'controlador/cproveedor.php';
include 'estilosTablas.php'; ?>
<div class="container-fluid lol">
	<div class="eti">Proveedor</div>
   	<form class="blanco" action="" method="POST">
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Identificacion proveedor:</label>
   	        <input type="text" class="form-control" name="idproveedor" pattern="[0-9]{4,12}" placeholder="Nit o Cedula de Ciudadanía" maxlength="12" title="Solo se permite un NIT valido o Cèdula de Ciudadanìa, máximo 12 caracteres" required>
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Nombre proveedor:</label>
   	        <input type="text" class="form-control" name="nombre" maxlength="150" required>
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
   	        <label for="">Contacto:</label>
   	        <input type="text" class="form-control" name="contacto" placeholder="Nombre del contacto" maxlength="100">
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Telefono proveedor:</label>
   	        <input type="text" class="form-control" name="telefono" pattern="[0-9]{7,20}" maxlength="20" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 20 caracteres">
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
   	        <label for="">Telefono contacto:</label>
   	        <input type="text" class="form-control" name="telefono2" pattern="[0-9]{7,20}" maxlength="20" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 20 caracteres">
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
   	        <label for="">Dirección:</label>
   	        <input type="text" class="form-control" name="direccion" maxlength="100">
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
   	        <label for="">Email:</label>
   	        <input type="email" class="form-control" name="email" maxlength="100">
		</div>

			<div class="form-group col-sm-6 col-md-6 col-lg-6"> <br>
         			<button type="submit" class="btn btn-success" value="Insertar">Registrar <span class="glyphicon glyphicon-send"></span></button>
      		</div>
	</form>
</div>
	<?php $consultaproveedor = $proveedor->consultar_proveedor(); ?>
		<table id="" class="display" cellspacing="0" width="100%">
	  		<thead>
          		<tr>
          		    <th colspan="12">Listado de Proveedores</th>
          		</tr>
          		<tr>
          		    <th>Identificacion proveeedor</th>
					<th>Nombre proveedor</th>
					<th>Contacto</th>
					<th>Teléfono proveedor</th>
					<th>Teléfono contacto</th>
					<th>Dirección</th>
					<th>Email</th>
					<th>Edición</th>
          		</tr>
       		</thead>
       		<tbody>
        		<?php for($i=0;$i<count($consultaproveedor);$i++):
        			//$proveedor1 = $compra->sel_proveedor1($consultacompra[$j]['proveedor']);
        		?>
				<tr>
					<td data-title='Identificacion proveeedor'><?= $consultaproveedor[$i]['idproveedor'] ?></td>
					<td data-title='Nombre proveedor'><?= $consultaproveedor[$i]['nombre'] ?></td>
					<td data-title='Contacto'><?= $consultaproveedor[$i]['contacto'] ?></td>
					<td data-title='Telefono proveedor'><?= $proveedor->formato_telefono_general($consultaproveedor[$i]['telefono']) ?></td>
					<td data-title='Telefono contacto'><?= $proveedor->formato_telefono_general($consultaproveedor[$i]['telefono2']) ?></td>
					<td data-title='direccion'><?= $consultaproveedor[$i]['direccion'] ?></td>
					<td data-title='email'><?= $consultaproveedor[$i]['email'] ?></td>
                    <td data-title='Edición'><a href="3&id=<?= $consultaproveedor[$i]['idproveedor'] ?>" class="btn btn-default btn-xs">Editar <span class="glyphicon glyphicon-edit"></span></a></td>
					<!--<td>
						<form action="" method="POST" onSubmit="return confirm('Desea eliminar el registro!');">
							<input type="hidden" name="idproveeli" value="<?= $consultaproveedor[$i]['idproveedor'] ?>">
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
        $('#registrar').addClass('active');
    });
</script>
