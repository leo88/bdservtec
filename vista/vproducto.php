<?php include("controlador/cproducto.php"); ?>

<div class="container-fluid lol">
	<div class="eti">Producto</div>
   	<form class="blanco" action="" method="POST">
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Proveedor:</label>
   	        <select name="idproveedor" class="form-control" >
				<option value=0>Seleccione proveedor</option>
				<?php for($j=0;$j<count($proveedor2);$j++): ?>
					<option value="<?= $proveedor2[$j]['idproveedor'] ?>"><?= $proveedor2[$j]['nombre'] ?></option>
				<?php endfor; ?>
			</select> 
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Nombre Completo:</label>
   	        <input type="text" class="form-control" name="nombre" pattern="[A-z ]{2,100}" title="Solo se permiten letras máximo 100 caracteres" required>        
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for="">Direccion residencia:</label>
   	        <input type="text" class="form-control" name="direccion" maxlength="100">        
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Teléfono:</label>
   	        <input type="text" class="form-control" name="telefono" pattern="[0-9]{7,10}" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 10 caracteres" required>          
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for="">Email:</label>
   	        <input type="email" class="form-control" name="email" maxlength="100">          
		</div>
		<div class="form-group col-md-6 col-lg-4">
   	        <label for=""><span style="color:red;">* </span>Estado:</label>
   	            <select name="estado" class="form-control" required>
                    <option value="">Seleccione una Opción</option>
                    <option value="1" selected>Activo</option>
                    <option value="2">Inactivo</option>
            	</select>          
		</div>
			<div class="form-group col-xs-4 col-xs-offset-4 col-sm-6 col-md-6 col-lg-4 col-lg-offset-5"> <br>
         		<button type="submit" class="btn btn-success" value="Insertar">Registrar <span class="icon-checkmark"></span></button>
      		</div>
	</form>
</div>
	<?php $consultavendedor = $vendedor->consultar_vendedor(); ?>
		<div id='no-more-tables'>
			<table class="table table-bordered table-hover" id="example">
	  		<thead>
          		<tr>
          		    <th colspan="12">Listado de vendedores</th>
          		</tr>
          		<tr>
          		    <th>Cédula</th>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Email</th>
					<th>Estado</th>
					<th>Edición</th>
          		</tr>
       		</thead>
       		<tbody>
        		<?php for($i=0;$i<count($consultavendedor);$i++): 
        			//$vendedor1 = $compra->sel_vendedor1($consultacompra[$j]['vendedor']);
        		?>
				<tr>
					<td data-title='Identificacion proveeedor'><?= $consultavendedor[$i]['idvendedor'] ?></td>
					<td data-title='Nombre vendedor'><?= $consultavendedor[$i]['nombre'] ?></td>
					<td data-title='direccion'><?= $consultavendedor[$i]['direccion'] ?></td>
					<td data-title='Telefono'><?= $vendedor->formato_telefono_general($consultavendedor[$i]['telefono']) ?></td>
					<td data-title='email'><?= $consultavendedor[$i]['email'] ?></td>
					<td data-title='estado'><?= $consultavendedor[$i]['estado'] ?></td>
                    <td data-title='Edición'><a href="index.php?pag=5&id=<?= $consultavendedor[$i]['idvendedor'] ?>" class="btn btn-primary"><span class="icon-pencil2"></span></a></td>
					<!--<td>
						<form action="" method="POST" onSubmit="return confirm('Desea eliminar el registro!');">
							<input type="hidden" name="idproveeli" value="<?= $consultavendedor[$i]['idvendedor'] ?>">
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