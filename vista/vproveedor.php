<?php include("controlador/cproveedor.php"); ?>

<div class="container-fluid lol">
	<div class="eti">Proveedor</div>
   	<form class="blanco" action="" method="POST">
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Identificacion proveedor:</label>
   	        <input type="text" class="form-control" name="idproveedor" pattern="[0-9]{4,12}" title="Solo se permite un NIT valido o Cèdula de Ciudadanìa, máximo 12 caracteres" required>    
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Nombre proveedor:</label>
   	        <input type="text" class="form-control" name="nombre" maxlength="50" required>        
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for="">contacto:</label>
   	        <input type="text" class="form-control" name="contacto" maxlength="50">        
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for="">Telefono proveedor:</label>
   	        <input type="number" class="form-control" name="telefono" pattern="[0-9]{7,20}" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 20 caracteres">          
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for="">Telefono contacto:</label>
   	        <input type="number" class="form-control" name="telefono2" pattern="[0-9]{7,20}" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 20 caracteres">          
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for="">Email:</label>
   	        <input type="email" class="form-control" name="email" maxlength="50">          
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Descripcion:</label>
   	            <select name="descripcion" class="form-control" required>
                    <option value="">Seleccione una Opción</option>
                    <option value="1" selected>Proveedor</option>
                    <option value="2">Local</option>
            	</select>        
		</div>
			<div class="form-group col-md-6"> <br>          		
         			<button type="submit" class="btn btn-success" value="Insertar">Registrar <span class="icon-checkmark"></span></button>
      		</div>
	</form>
</div>
	<?php $consultaproveedor = $proveedor->consultar_proveedor(); ?>
		<div id='no-more-tables'>
			<table class="table table-bordered table-hover" id="example">
	  		<thead>
          		<tr>
          		    <th colspan="12">Listado de Proveedores</th>
          		</tr>
          		<tr>
          		    <th>Identificacion proveeedor</th>
				<th>Nombre proveedor</th>
				<th>Contacto</th>
				<th>Telefono proveedor</th>
				<th>Telefono contacto</th>
				<th>Email</th>
				<th>Descripcion</th>
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
					<td data-title='Email'><?= $consultaproveedor[$i]['email'] ?></td>
					<td data-title='Descripcion'><?= $consultaproveedor[$i]['descripcion'] ?></td>
                    <td data-title='Edición'><a href="home.php?pag=8&id=<?= $consultaproveedor[$i]['idproveedor'] ?>" class="btn btn-primary"><span class="icon-pencil2"></span></a></td>
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
