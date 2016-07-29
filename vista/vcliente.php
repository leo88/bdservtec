<!--
		* version: 1.1 28/07/2016
-->

<?php include 'controlador/ccliente.php'; ?>

<div class="container-fluid lol">
<div class="eti">Registro de Clientes</div>

	<form class="blanco" action="" method="POST">
		<div class="form-group col-md-6 col-lg-4">
            <label for=""><span style="color:red;">* </span>Nombre Cliente:</label>
            <input type="text" class="form-control" name="nombre" maxlength="100" required>
		</div>
		<div class="form-group col-md-6 col-lg-4">
            <label for=""><span style="color:red;">* </span>Detalle:</label>
            <select name="detalle" class="form-control" required>
                    <option value="" selected>Seleccione una Opción</option>
                    <option value="1">Cliente</option>
                    <option value="2">Servicio tecnico</option>
                    <option value="3">Intermediario</option>
            </select>
		</div>
		<div class="form-group col-md-6 col-lg-4">
            <label for="">Teléfono:</label>
            <input type="text" class="form-control" name="telefono" pattern="[0-9]{7,20}" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 20 caracteres">
		</div>
		 <div class="form-group col-md-6 col-lg-12 col-lg-offset-5"> <br>
            <button type="submit" class="btn btn-success" value="Insertar">Registrar <span class="glyphicon glyphicon-send"></span></button>
        </div>
	</form>
</div>
<?php $consultacliente = $cliente->consultar_cliente(); ?>
					<div id='no-more-tables'>
						<table class="table table-bordered table-hover" id="example">
				  <thead>
            <tr>
                <th colspan="3">Listado de clientes</th>
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
            <?php for($i=0;$i<count($consultacliente);$i++): ?>
                <tr>
                    <td data-title='ID'><?= $consultacliente[$i]['idcliente'] ?></td>
                    <td data-title='Nombre'><?= $consultacliente[$i]['nombre'] ?></td>
                    <td data-title='Detalle'><?= $consultacliente[$i]['detalle'] ?></td>
                    <td data-title='Teléfono'><?= $cliente->formato_telefono_general($consultacliente[$i]['telefono']) ?></td>
                    <td data-title='Edición'><a href="index.php?pag=7&id=<?= $consultacliente[$i]['idcliente'] ?>" class="btn btn-primary">Editar <span class="glyphicon glyphicon-edit"></span></a></td>
                </tr>
            <?php endfor; ?>

        </tbody>
    </table>
    </div>
    </div><!--/row-->
<br/><br/>
