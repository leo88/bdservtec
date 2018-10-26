<?php 

	/*
	 	*	@Version: V1.1 12/08/2016
	*/
	include 'controlador/cserviciotecnico.php'; 
	include 'estilosTablas.php';
?>


<div class="container-fluid lol">
<div class="eti">Servicio Técnico</div>

	<form class="blanco" action="" method="POST">
		<div class="col-sm-6 col-md-4 col-lg-4">
            <label for=""><span style="color:red;">* </span>Cliente:</label>
            <select name="id_cliente" class="chzn-select form-control" required>
				<option value=0>Seleccione cliente</option>
				<?php for($i=0;$i<count($cliente2);$i++): ?>
					<option value="<?= $cliente2[$i]['idcliente'] ?>"><?= $cliente2[$i]['nombre'] ?></option>
				<?php endfor; ?>
			</select>            
		</div>
		<div class="form-group col-sm-6 col-md-4 col-lg-4">
            <label for=""><span style="color:red;">* </span>Tipo de Dispositivo:</label>
            <input type="text" class="form-control" name="dispositivo" pattern="[A-z ]{2,50}" title="Solo se permiten letras máximo 50 caracteres" placeholder="Celular, Tablet, etc" required>      
		</div>
		<div class="form-group col-sm-6 col-md-4 col-lg-4">
             <label for=""><span style="color:red;">* </span>Marca:</label>
            <input type="text" class="form-control" name="marca" pattern="[A-z ]{2,20}" title="Solo se permiten letras máximo 20 caracteres" required>     
		</div>
		<div class="form-group col-sm-6 col-md-4 col-lg-4">
            <label for=""><span style="color:red;">* </span>Referencia:</label>
            <input type="text" class="form-control" name="referencia" maxlength="20" required >           
		</div>
		<div class="form-group col-sm-6 col-md-4 col-lg-4">
            <label for=""><span style="color:red;">* </span>Descripción del servicio:</label>
            <textarea name="descripcion_st" class="form-control" rows="1" cols="30" maxlength="100" placeholder="Razón por la que entra a servicio" required> </textarea>     
		</div>
		<div class="form-group col-sm-6 col-md-4 col-lg-4">
             <label for="">Observacion:</label>
            <input type="text" class="form-control" name="observacion" placeholder="Ej: viene con funda azul, etc" maxlength="50">           
		</div>
		<div class="form-group col-sm-6 col-md-4 col-lg-4">
            <label for=""><span style="color:red;">* </span>Empleado:</label>
            <select name="empleado" class="chzn-select form-control" required>
				<option value=0>Seleccione empleado</option>
				<?php for($i=0;$i<count($empleado2);$i++): ?>
					<option value="<?= $empleado2[$i]['idempleado'] ?>"><?= $empleado2[$i]['nombre'] ?></option>
				<?php endfor; ?>
			</select>     
			<input type="hidden" class="form-control" name="fecha" value="<?php echo date('Y-m-d'); ?>" required >    
		</div>
		 <div class="form-group col-sm-6 col-md-7 col-lg-7"> <br>  
            <button type="submit" class="btn btn-success" value="Insertar">Registrar <span class="glyphicon glyphicon-send"></span></button>
            <a href="index.php?pag=21" target="_blank" class="btn btn-primary">Vista Impresión <span class="glyphicon glyphicon-print"></span></a>
        </div>
	</form>
</div>
<?php $consultaserviciotecnico = $serviciotecnico->consultarServicio(); ?>
<table id="" class="display" cellspacing="0" width="100%">
		<thead>
            <tr>
                <th colspan="12">Listado de Servicio Tecnico</th>
            </tr>
            <tr>
                <th>No. Orden</th>
                <th>Cliente</th>
				<th>Dispositivo</th>
				<th>Marca</th>
				<th>Referencia</th>
				<th>Descripción</th>
				<th>Observación</th>
				<th>Empleado</th>
				<th>Fecha Recibido</th>
				<th>Edición</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($consultaserviciotecnico);$i++): 
				$empleado1 = $serviciotecnico->seleccionarEmpleadoID($consultaserviciotecnico[$i]['empleado']);
				$cliente1 = $serviciotecnico->seleccionarClienteID($consultaserviciotecnico[$i]['id_cliente']);
			?>
				<tr>
					<td data-title='No. Orden'><?= $consultaserviciotecnico[$i]['numero_orden'] ?></td>
					<td data-title='Cliente'><?= $cliente1[0]['nombre'] ?></td>
					<td data-title='Dispositivo'><?= $consultaserviciotecnico[$i]['dispositivo'] ?></td>
					<td data-title='Marca'><?= $consultaserviciotecnico[$i]['marca'] ?></td>
					<td data-title='Referencia'><?= $consultaserviciotecnico[$i]['referencia'] ?></td>
					<td data-title='Descripcion'><?= $consultaserviciotecnico[$i]['descripcion_st'] ?></td>
					<td data-title='Observacion'><?= $consultaserviciotecnico[$i]['observacion'] ?></td>
					<td data-title='ID Empleado'><?= $empleado1[0]['nombre'] ?></td>
					<td data-title='Fecha'><?= $consultaserviciotecnico[$i]['fecha'] ?></td>
					<td data-title='Edición'><a href="index.php?pag=19&id=<?= $consultaserviciotecnico[$i]['numero_orden'] ?>" class="btn btn-default">Editar <span class="glyphicon glyphicon-edit"></span></a></td>
					<!--
					<td data-title='Eliminación'>
						<form action="" method="POST" onSubmit="return confirm('Desea eliminar el registro!');">
							<input type="hidden" name="idserviteceli" value="<?= $consultaserviciotecnico[$i]['numero_orden'] ?>">
							<button type="submit" class="btn btn-danger" value="Eliminar"><span class="icon-bin"></span></button>
						</form>
					</td>-->
				</tr>
			<?php endfor; ?>
        </tbody>
	</table>
<br></br>
<!--
	* Selector en la barra del menú
-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".nav li").removeClass("active");//this will remove the active class from previously active menu item
        $('#st').addClass('active');
    });
</script>