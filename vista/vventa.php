<div class="row-fluid">
<!-- inicio venta -->
<div class="span4">	
  <?php include("controlador/cventa.php"); ?>
    <div class="container-fluid lol">
        <div class="eti">Registrar Venta</div>
        <form action="" method="POST" class="blanco">
        
        <div class="form-group campo">
           <label for=""><span style="color:red;">* </span>fechasalida:</label>
            <input type="date" class="form-control" name="fechasalida" value="<?php echo date('Y-m-d'); ?>" readonly required>          
		</div>
       
       <div class="form-group campo">
           <label for=""><span style="color:red;">* </span>vendedor:</label> 
            <select name="idvendedor" class="form-control" >
				<option value=0>Seleccione vendedor</option>
				<?php for($j=0;$j<count($vendedor2);$j++): ?>
					<option value="<?= $vendedor2[$j]['idvendedor'] ?>"><?= $vendedor2[$j]['nombre'] ?></option>
				<?php endfor; ?>
			</select>           
		</div>
        
		<div class="form-group campo">
            <label for=""><span style="color:red;">* </span>Comprador:</label><br> 
            <select name="idcomprador" class="chzn-select form-control" >
				<option value=0>Seleccione comprador</option>
				<?php for($j=0;$j<count($comprador2);$j++): ?>
					<option value="<?= $comprador2[$j]['idcomprador'] ?>"><?= $comprador2[$j]['nombre'] ?></option>
				<?php endfor; ?>
			</select>      
		</div>	
		
        <div class="form-group campo">           
            <label for="">Total:</label>
            <input type="number" class="form-control" name="total" pattern="[0-9]{1,10}" title="Solo validos numeros" min="0" required> 
		</div>			
		
        <div class="form-group campo"> <br> 
              <button type="submit" class="btn btn-success" value="Insertar"><span class="icon-checkmark"></span></button>
        </div>
	</form>	
    </div>
    <!-- Tabla donde se muestra la informacion ingresada-->
    <?php $consultaventa = $venta->consultar_venta(); ?>
    <div class="table-responsive">
        <table class="table">
		<thead>
			<tr>
				<th colspan="12">Ultima venta</th>
			</tr>
			<tr>
				<th>ID</th>
				<th>fechasalida</th>								
				<th>vendedor</th>
				<th>comprador</th>
				<th>total</th>
			</tr>
		</thead>
		<tbody>
				<?php for($j=0;$j<count($consultaventa);$j++): 
				$comprador1 	= $venta->sel_comprador1($consultaventa[$j]['idcomprador']);
				$vendedor1 	= $venta->sel_vendedor1($consultaventa[$j]['idvendedor']);
			?>
				<tr>
					<td><?= $consultaventa[$j]['idventa'] ?></td>
					<td><?= $consultaventa[$j]['fechasalida'] ?></td>
					<td><?= $vendedor1[0]['nombre'] ?></td>
					<td><?= $comprador1[0]['nombre'] ?></td>
					<td><?= $consultaventa[$j]['total'] ?></td>					
					<!--<td><a href="home.php?pag=25&idv=<?= $consultaventa[$j]['idventa'] ?>" class="btn btn-primary">Editar</a></td>-->
				</tr>
			<?php endfor; ?>
		</tbody>
	</table>
	</div>
</div>
<!-- final venta -->         	
	
<br><br>
<script type="text/javascript">
    $(document).ready(function () {
        $(".nav li").removeClass("active");//this will remove the active class from  
                                            //previously active menu item 
        $('#venta').addClass('active');
    });
</script>