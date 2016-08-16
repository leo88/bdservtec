<?php

    /*
        *   @Version: V1.1 16/08/2016
    */

    include 'estilos.php'; 
    include 'modelo/mconsulta.php'; 
    
    $venta = new Mconsulta();
 
    $consultaventa          = $venta->consultarVentaTotal();
    $consultaventaproductos = $venta->consultarVenta();

?>
<!--Inicio venta-->
<div class="row-fluid">
<input type="checkbox"  id="spoiler2" /> 
<label for="spoiler2" >Informe Venta</label>
<div class="spoiler">
<div class="info">

	<table id="" class="display" cellspacing="0" width="100%">
	   <thead>
            <tr>
                <th colspan="12">Ventas</th>
            </tr>
            <tr>
                <th>No. venta</th>
                <th>Fecha</th>
                <th>ID Cliente</th>
                <th>Nombre Cliente</th>
                <th>ID Empleado</th>
                <th>Nombre Empleado</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($consultaventa);$i++): ?>
                <tr>
                    <td data-title='No. venta'><?= $consultaventa[$i]['numero_venta'] ?></td>
                    <td data-title='Fecha'><?= $consultaventa[$i]['fecha'] ?></td>
                    <td data-title='ID Cliente'><?= $consultaventa[$i]['idcliente'] ?></td>
                    <td data-title='Nombre Cliente'><?= $consultaventa[$i]['cliente'] ?></td>
                    <td data-title='ID Empleado'><?= $consultaventa[$i]['idempleado'] ?></td>
                    <td data-title='Nombre Empleado'><?= $consultaventa[$i]['empleado'] ?></td>
                    <td data-title='Total'>$ <?= number_format($consultaventa[$i]['total']) ?></td>                    
                </tr>
            <?php endfor; ?>
        </tbody>
    </table> 
         
</div>
</div>
</div>
         
<!--Inicio venta por Producto-->
<div class="row-fluid">
<input type="checkbox"  id="spoiler3" /> 
<label for="spoiler3" >Informe Productos por venta</label>
<div class="spoiler">
<div class="info"> 
            
<table id="" class="display" cellspacing="0" width="100%">
	   <thead>
            <tr>
                <th colspan="12">Ventas por Producto</th>
            </tr>
            <tr>
                <th>No. venta</th>
                <th>IDCódigo</th>
                <th>Referencia</th>
                <th>Descripción</th>
                <th>Tipo</th>   
                <th>Marca</th>
                <th>Valor</th>
                <th>Cantidad</th>
                <th>Subtotal</th>             
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($consultaventaproductos);$i++): ?>
                <tr>
                    <td data-title='No. venta'><?= $consultaventaproductos[$i]['numero_venta'] ?></td>
                    <td data-title='IDCódigo'><?= $consultaventaproductos[$i]['idcodigo'] ?></td>
                    <td data-title='Referencia'><?= $consultaventaproductos[$i]['referencia'] ?></td>
                    <td data-title='Descripción'><?= $consultaventaproductos[$i]['descripcion'] ?></td>
                    <td data-title='Tipo'><?= $consultaventaproductos[$i]['tipo'] ?></td>
                    <td data-title='Marca'><?= $consultaventaproductos[$i]['marca'] ?></td>
                    <td data-title='Valor'>$ <?= number_format($consultaventaproductos[$i]['valor']) ?></td>
                    <td data-title='Cantidad'><?= $consultaventaproductos[$i]['cantidad']*-1 ?></td>
                    <td data-title='Subtotal'>$ <?= number_format($consultaventaproductos[$i]['SUBTOTAL']) ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table> 
    
</div>
</div>
</div>
 
</div>     
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".nav li").removeClass("active");//this will remove the active class from  
                                            //previously active menu item 
        $('#consulta').addClass('active');
    });
</script>