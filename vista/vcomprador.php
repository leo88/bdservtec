
<?php include('controlador/ccomprador.php'); ?>

<div class="container-fluid lol">
<div class="eti">comprador</div>

	<form class="blanco" action="" method="POST">
		<div class="form-group campo">
            <label for=""><span style="color:red;">* </span>Nombre comprador:</label>
            <input type="text" class="form-control" name="nombre" pattern="[A-z ]{2,50}" title="Solo se permiten letras máximo 50 caracteres" required>       
		</div>	
		<div class="form-group campo">
            <label for=""><span style="color:red;">* </span>Detalle:</label>
            <select name="detalle" class="form-control" required>
                    <option value="" selected>Seleccione una Opción</option>
                    <option value="1">Cliente</option>
                    <option value="2">Servicio tecnico</option>
                    <option value="3">Intermediario</option>
            </select>         
		</div>
		<div class="form-group campo">
            <label for="">Teléfono:</label>
            <input type="text" class="form-control" name="telefono" pattern="[0-9]{7,20}" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 20 caracteres">       
		</div>
		 <div class="form-group campo"> <br>          		
            <button type="submit" class="btn btn-success" value="Insertar">Registrar <span class="icon-checkmark"></span></button>
        </div>
	</form>
</div>
<?php $consultacomprador = $comprador->consultar_comprador(); ?>
					<div id='no-more-tables'>
						<table class="table table-bordered table-hover" id="example">
				  <thead>
            <tr>
                <th colspan="3">Listado de compradors</th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>Teléfono</th>                
                <th>Edición</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($consultacomprador);$i++): ?>
                <tr>
                    <td data-title='ID'><?= $consultacomprador[$i]['idcomprador'] ?></td>
                    <td data-title='Nombre'><?= $consultacomprador[$i]['nombre'] ?></td>
                    <td data-title='Detalle'><?= $consultacomprador[$i]['detalle'] ?></td>
                    <td data-title='Teléfono'><?= $comprador->formato_telefono_general($consultacomprador[$i]['telefono']) ?></td>
                    <td data-title='Edición'><a href="index.php?pag=7&id=<?= $consultacomprador[$i]['idcomprador'] ?>" class="btn btn-primary"><span class="icon-pencil2"></span></a></td>
                </tr>
            <?php endfor; ?>
            
        </tbody>
    </table>	
    </div>
    </div><!--/row-->
<br/><br/>  

		    