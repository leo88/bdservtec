<?php 

	/*
	 	*	version: 1.0 10/08/2016
	*/
	include 'controlador/cserviciotecnico.php'; 
?>


<div class="container-fluid lol">
<div class="eti">Servicio Tecnico</div>

	<form class="blanco" action="" method="POST">
		<div class="form-group col-sm-6 col-md-4 col-lg-4">
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
            <input type="text" class="form-control" name="nombre" pattern="[A-z ]{2,50}" title="Solo se permiten letras máximo 50 caracteres" required>      
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
            <textarea name="descripcion_st" class="form-control" rows="1" cols="30" maxlength="100" required> </textarea>     
		</div>
		<div class="form-group col-sm-6 col-md-4 col-lg-4">
             <label for="">Observacion:</label>
            <input type="text" class="form-control" name="observacion" maxlength="50">           
		</div>
		<div class="form-group col-sm-6 col-md-4 col-lg-4">
           <label for=""><span style="color:red;">* </span>Fecha:</label>
            <input type="date" class="form-control" name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly required >  
		</div>
		<div class="form-group col-sm-6 col-md-4 col-lg-4">
            <label for=""><span style="color:red;">* </span>Empleado:</label>
            <select name="empleado" class="chzn-select form-control" required>
				<option value=0>Seleccione empleado</option>
				<?php for($i=0;$i<count($empleado2);$i++): ?>
					<option value="<?= $empleado2[$i]['idempleado'] ?>"><?= $empleado2[$i]['nombre'] ?></option>
				<?php endfor; ?>
			</select>         
		</div>
		<div class="form-group col-sm-6 col-md-4 col-lg-4">
           <label for=""><span style="color:red;">* </span>Abono:</label>
           <div class="input-group">
  				<span class="input-group-addon">$</span>
  				<input type="number" class="form-control" name="abono" pattern="[0-9]{1,11}" min="0" title="Solo se permiten numeros, máximo 11" required>
			</div>       
		</div>
		 <div class="form-group col-sm-6 col-md-4 col-lg-4"> <br>  
            <button type="submit" class="btn btn-success" value="Insertar">Registrar <span class="glyphicon glyphicon-ok"></span></button>
            <a href="home.php?pag=43" class="btn btn-primary">Vista Impresión <span class="glyphicon glyphicon-print"></span></a>
        </div>
	</form>
</div>
<?php $consultaserviciotecnico = $serviciotecnico->consultar_serviciotecnico(); ?>
<div id='no-more-tables'>
	<table class="table table-bordered table-hover" id="example">
		<thead>
            <tr>
                <th colspan="12">Listado de Servicio Tecnico</th>
            </tr>
            <tr>
                <th>No. Orden</th>
				<th>Dispositivo</th>
				<th>Marca</th>
				<th>Referencia</th>
				<th>Descripcion</th>
				<th>Observacion</th>
				<th>Precio Cliente</th>
				<th>Fecha Recibido</th>
				<th>ID Cliente</th>
				<th>ID Empleado</th>
				<th>Abono Cliente</th>
				<?php if ($perfil=='Administrador'): ?>
					<th>Edición</th>
					<th>Borrar</th>
				<?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($consultaserviciotecnico);$i++): 
				$empleado1 = $serviciotecnico->sel_empleado1($consultaserviciotecnico[$i]['empleado']);
				$cliente1 = $serviciotecnico->sel_cliente1($consultaserviciotecnico[$i]['id_cliente']);
			?>
				<tr>
					<td data-title='No. Orden'><?= $consultaserviciotecnico[$i]['numero_orden'] ?></td>
					<td data-title='Dispositivo'><?= $consultaserviciotecnico[$i]['nombre'] ?></td>
					<td data-title='Marca'><?= $consultaserviciotecnico[$i]['marca'] ?></td>
					<td data-title='Referencia'><?= $consultaserviciotecnico[$i]['referencia'] ?></td>
					<td data-title='Descripcion'><?= $consultaserviciotecnico[$i]['descripcion_st'] ?></td>
					<td data-title='Observacion'><?= $consultaserviciotecnico[$i]['observacion'] ?></td>
					<td data-title='Precio Cliente'>$ <?= number_format($consultaserviciotecnico[$i]['precio_cliente']) ?></td>
					<td data-title='Fecha'><?= $consultaserviciotecnico[$i]['fecha'] ?></td>
					<td data-title='ID Cliente'><?= $cliente1[0]['nombre'] ?></td>
					<td data-title='ID Empleado'><?= $empleado1[0]['nombre'] ?></td>
					<td data-title='Abono'>$ <?= number_format($consultaserviciotecnico[$i]['abono']) ?></td>
					<?php if ($perfil=='Administrador'): ?>
					<td data-title='Edición'><a href="home.php?pag=14&id=<?= $consultaserviciotecnico[$i]['numero_orden'] ?>" class="btn btn-primary"><span class="icon-pencil2"></span></a></td>
					<td data-title='Eliminación'>
						<form action="" method="POST" onSubmit="return confirm('Desea eliminar el registro!');">
							<input type="hidden" name="idserviteceli" value="<?= $consultaserviciotecnico[$i]['numero_orden'] ?>">
							<button type="submit" class="btn btn-danger" value="Eliminar"><span class="icon-bin"></span></button>
						</form>
					</td>
					<?php endif ?>
				</tr>
			<?php endfor; ?>
        </tbody>
	</table>
</div>
        <!--inicio modal mensaje-->        
             <div class="cajaexterna">
              <div class="cajainterna animated">
                <div class="cajacentrada">                                 
                   <video src="videos/servicio_tecnico.mp4" controls width="60%" height="cover" autoplay preload>Tu navegador no implementa el video <code>video</code></video> 
                    <br> 
                   <div class="cierramodal">
                   <a href="#" class="cerrarmodal btn btn-danger">CERRAR</a>
                  </div>                
                </div>
              </div>
            </div>
         <!--final modal mensaje-->  
<br></br>
<script type="text/javascript">
    $(document).ready(function () {
        $(".nav li").removeClass("active");//this will remove the active class from  
                                            //previously active menu item 
        $('#st').addClass('active');
    });
</script>