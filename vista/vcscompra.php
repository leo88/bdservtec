<?php

    /*
        *   @Version: V1.0 04/08/16
    */

    include 'estilos.php';
    include 'modelo/mconsulta.php';
    $compra = new Mconsulta();

    $consultacompra             = $compra->consultarCompraTotal();
    $consultacompraproductos    = $compra->consultarCompra();
?>

<!--Inicio Compra-->
<div class="row-fluid">
<input type="checkbox"  id="spoiler2" />
<label for="spoiler2" >Informe Compra</label>
<div class="spoiler">
<div class="info">

	<table id="" class="display" cellspacing="0" width="100%">
	   <thead>
            <tr>
                <th colspan="12">Compras</th>
            </tr>
            <tr>
                <th>No. Compra</th>
                <th>Fecha</th>
                <th>ID Proveedor</th>
                <th>Nombre/Razon Social</th>
                <th>Telefono</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($consultacompra);$i++): ?>
                <tr>
                    <td data-title='No. Compra'><?= $consultacompra[$i]['numero_compra'] ?></td>
                    <td data-title='Fecha'><?= $consultacompra[$i]['fecha'] ?></td>
                    <td data-title='Proveedor'><?= $consultacompra[$i]['proveedor'] ?></td>
                    <td data-title='Nombre'><?= $consultacompra[$i]['nombre'] ?></td>
                    <td data-title='Telefono'><?= $consultacompra[$i]['telefono'] ?></td>
                    <td data-title='Total'>$ <?= number_format($consultacompra[$i]['total']) ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

</div>
</div>
</div>

<!--Inicio Compra por Producto-->
<div class="row-fluid">
<input type="checkbox"  id="spoiler3" />
<label for="spoiler3" >Informe Productos por Compra</label>
<div class="spoiler">
<div class="info">

<table id="" class="display" cellspacing="0" width="100%">
	   <thead>
            <tr>
                <th colspan="12">Productos por compra</th>
            </tr>
            <tr>
                <th>No. Compra</th>
                <th>Codigo</th>
                <th>Referencia</th>
                <th>Descripcion</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Valor</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($consultacompraproductos);$i++): ?>
                <tr>
                    <td data-title='No. Compra'><?= $consultacompraproductos[$i]['numero_compra'] ?></td>
                    <td data-title='Codigo'><?= $consultacompraproductos[$i]['idcodigo'] ?></td>
                    <td data-title='Referencia'><?= $consultacompraproductos[$i]['referencia'] ?></td>
                    <td data-title='Descripcion'><?= $consultacompraproductos[$i]['descripcion'] ?></td>
                    <td data-title='Tipo'><?= $consultacompraproductos[$i]['tipo'] ?></td>
                    <td data-title='Marca'><?= $consultacompraproductos[$i]['marca'] ?></td>
                    <td data-title='Valor'>$ <?= number_format($consultacompraproductos[$i]['valor']) ?></td>
                    <td data-title='Cantidad'><?= $consultacompraproductos[$i]['cantidad'] ?></td>
                    <td data-title='Subtotal'>$ <?= number_format($consultacompraproductos[$i]['SUBTOTAL']) ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

</div>
</div>
</div>

<!--
    * Selector en la barra del menú
-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".nav li").removeClass("active");//this will remove the active class from previously active menu item
        $('#consulta').addClass('active');
    });
</script>
