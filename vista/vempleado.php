<!--
	* version: 1.4 19/08/2018
-->

<?php include 'controlador/cempleado.php';
include 'estilosTablas.php'; ?>

<div class="container-fluid lol">
<div class="eti">Empleado</div>

	<form class="blanco" action="" method="POST">
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label for=""><span style="color:red;">* </span>Cédula de Ciudadania:</label>
            <input type="text" class="form-control" name="idempleado" pattern="[0-9]{5,10}" maxlength="10" title="Se requiere un numero de identificación valido sin espacios"required>
            <input type="hidden" name="estado" value="Activo">
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label for=""><span style="color:red;">* </span>Nombre del empleado:</label>
            <input type="text" class="form-control" name="nombre" placeholder="No utlizar la letra 'ñ' ni tildes" pattern="[A-z ]{2,100}" maxlength="100" title="Solo se permiten letras, no se permite la letra 'ñ' ni tildes, máximo 50 caracteres" required>
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label for=""><span style="color:red;">* </span>Dirección del empleado:</label>
            <input type="text" class="form-control" name="direccion" maxlength="50" required >
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label for=""><span style="color:red;">* </span>Teléfono del empleado:</label>
            <input type="text" class="form-control" name="telefono" pattern="[0-9]{5,20}" maxlength="20" title="Solo se permiten telefonos validos, minimo desde 7 numeros y máximo 20 caracteres" required>
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
           <label for="">Email:</label>
            <input type="email" class="form-control" name="email" maxlength="100">
		</div>
		<div class="form-group col-sm-6 col-md-6 col-lg-4">
            <label for=""><span style="color:red;">* </span>Perfil:</label>
            <select name="perfil" class="form-control" required>
                <option value="">Seleccione una Opción</option>
                <option value="1">Administrador</option>
                <option value="2">Tecnico</option>
                <option value="3" selected>Vendedor</option>
            </select>
		</div>
		 <div class="form-group col-sm-6 col-md-6 col-lg-4"> <br>
            <button type="submit" class="btn btn-success" value="Insertar">Registrar <span class="glyphicon glyphicon-send"></span></button>
        </div>
	</form>
</div>
<?php $consultaempleado = $empleado->consultar_empleado(); ?>
	<table id="" class="display" cellspacing="0" width="100%">
		<thead>
            <tr>
                <th colspan="12">Listado de Empleados</th>
            </tr>
            <tr>
        <th>Cedula</th>
				<th>Nombre</th>
				<th>Direccion</th>
				<th>Teléfono Personal</th>
				<th>Email</th>
				<th>Perfil</th>
				<th>Estado</th>
				<th>Edición</th>
            </tr>
        </thead>
        <tbody>
           <?php for($i=0;$i<count($consultaempleado);$i++): ?>
				<tr>
					<td data-title='Cedula'><?= $consultaempleado[$i]['idempleado'] ?></td>
					<td data-title='Nombre'><?= $consultaempleado[$i]['nombre'] ?></td>
					<td data-title='Direccion'><?= $consultaempleado[$i]['direccion'] ?></td>
					<td data-title='Teléfono'><?= $empleado->formato_telefono_general($consultaempleado[$i]['telefono']) ?></td>
					<td data-title='Email'><?= $consultaempleado[$i]['email'] ?></td>
					<td data-title='Perfil'><?= $consultaempleado[$i]['perfil'] ?></td>
					<td data-title='Estado'><?= $consultaempleado[$i]['estado'] ?></td>
          <td data-title='Edición'><a href="5&id=<?= $consultaempleado[$i]['idempleado'] ?>" class="btn btn-default btn-xs">Editar <span class="glyphicon glyphicon-edit"></span></a></td>
					<!--<td>
						<form action="" method="POST" onSubmit="return confirm('Desea eliminar el registro!');">
							<input type="hidden" name="idempleeli" value="<?= $consultaempleado[$i]['idempleado'] ?>">
							<input type="submit" class="btn btn-danger" value="Eliminar">
						</form>
					</td>-->
				</tr>
			<?php endfor; ?>
        </tbody>
	</table>
<br>
<script type="text/javascript">
    $(document).ready(function () {
        $(".nav li").removeClass("active");//this will remove the active class from
                                            //previously active menu item
        $('#registrar').addClass('active');
    });
</script>
