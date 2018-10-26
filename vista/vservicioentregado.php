<?php 
  
  /*
      * @Version: V1.1 12/08/2016
  */

  include 'controlador/cservicioentregado.php';
  include 'estilosTablas.php'; 
?>

<div class="container-fluid lol">
<div class="eti">Servicio Técnico Entregado</div>

	<form class="blanco" action="" method="POST">
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label for=""><span style="color:red;">* </span>No. Orden:</label>
             <select name="numero_orden" class="form-control" required>
				<option value=0>Seleccione No. Orden</option>
				<?php for($i=0;$i<count($numorden2);$i++): ?>
					<option value="<?= $numorden2[$i]['numero_orden'];?>"> <?= $numorden2[$i]['numero_orden'] ?></option>
				<?php endfor; ?>
			</select>
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
             <label for=""><span style="color:red;">* </span>Fecha:</label>
            <input type="date" class="form-control" name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly required>
		</div>
    <div class="form-group col-sm-6 col-md-6 col-lg-4">
      <label for=""><span style="color:red;">* </span>Costo:</label>
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="number" class="form-control" name="costo" pattern="[0-9]{1,11}" min="0" title="Solo se permiten numeros, máximo 11" required>
            </div>
    </div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label for=""><span style="color:red;">* </span>Tecnico encargado:</label>
            <input type="text" class="form-control" name="tecnico" pattern="[A-z ]{2,50}" title="Solo se permiten letras, no se permite la letra 'ñ' ni tildes, máximo 50 caracteres" required>
		</div>
    <div class="form-group col-sm-6 col-md-6 col-lg-4">
      <label for=""><span style="color:red;">* </span>Estado:</label>
      <select name="estado" class="form-control" required>
             <option value="" selected>Seleccione una Opción</option>
             <option value="1">Reparado</option>
             <option value="2">No reparado</option>
             <option value="3">Entregado a peticion</option>
     </select>
    </div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4"> <br>
      <button type="submit" class="btn btn-success" value="Insertar">Registrar <span class="glyphicon glyphicon-send"></span></button>
    </div>
	</form>
</div>
<?php $consultaservicioentregado = $servicioentregado->consultar_servicioentregado(); ?>
			<table id="" class="display" cellspacing="0" width="100%">
				  <thead>
            <tr>
                <th colspan="12">Listado de Servicio T. Entregado</th>
            </tr>
            <tr>
        <th>No. Orden</th>
				<th>Fecha</th>
				<th>Costo</th>
				<th>Tecnico encargado</th>
        <th>Estado</th>
        <th>Edicion</th>
				<!--<th>Edición</th>
				<th>Eliminación</th>-->
            </tr>
        </thead>
        <tbody>
           <?php for($i=0;$i<count($consultaservicioentregado);$i++):
            $numorden1 = $servicioentregado->sel_orden1($consultaservicioentregado[$i]['numero_orden']);

            ?>
				<tr>
					<td data-title='No. Orden'><?= $numorden1[0]['numero_orden'] ?></td>
					<td data-title='Fecha'><?= $consultaservicioentregado[$i]['fecha'] ?></td>
					<td data-title='Costo'>$ <?= number_format($consultaservicioentregado[$i]['costo']) ?></td>
					<td data-title='Tecnico encargado'><?= $consultaservicioentregado[$i]['tecnico'] ?></td>
          <td data-title='Estado'><?= $consultaservicioentregado[$i]['estado'] ?></td>
          <td data-title='Edición'><a href="index.php?pag=15&id=<?= $consultaservicioentregado[$i]['numero_orden'] ?>" class="btn btn-default btn-xs">Editar <span class="glyphicon glyphicon-edit"></span></a></td>
					<!--<td><a href="index.php?pag=4&id=<?= $consultaservicioentregado[$i]['numero_orden'] ?>" class="btn btn-primary">Editar</a></td>
					<td>
						<form action="" method="POST" onSubmit="return confirm('Desea eliminar el registro!');">
							<input type="hidden" name="idserventeli" value="<?= $consultaservicioentregado[$i]['numero_orden'] ?>">
							<input type="submit" class="btn btn-danger" value="Eliminar">
						</form>
					</td>-->
				</tr>
			<?php endfor; ?>
        </tbody>
	</table>
	</div>
        <!--inicio modal mensaje-->
             <div class="cajaexterna">
              <div class="cajainterna animated">
                <div class="cajacentrada">
                   <video src="videos/servicio_entregado.mp4" controls width="60%" height="cover" autoplay preload>Tu navegador no implementa el video <code>video</code></video>
                    <br>
                   <div class="cierramodal">
                   <a href="#" class="cerrarmodal btn btn-danger">CERRAR</a>
                  </div>
                </div>
              </div>
            </div>
         <!--final modal mensaje-->
<br/><br/>
<script type="text/javascript">
    $(document).ready(function () {
        $(".nav li").removeClass("active");//this will remove the active class from
                                            //previously active menu item
        $('#st').addClass('active');
    });
</script>
