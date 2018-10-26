<?php 
    include 'modelo/mconsulta.php'; 
    $venta = new Mconsulta();
?>
<link rel="stylesheet" href="css/impreso.css"/>
<link rel="stylesheet" href="css/impreso.css" media="print"/>
<link href='https://fonts.googleapis.com/css?family=BenchNine:400,700' rel='stylesheet' type='text/css'>
<?php 
$consultaventa          = $venta->consultar_venta_id();
$idprint                = $consultaventa[0]['numero_venta'];
$consultaventaproducto  = $venta->consultar_ventaproducto_id($idprint);
$consultaventatotal     = $venta->consultar_ventatotal_id($idprint);
$total                  = 0;
//echo $idprint;

?>
  <div id="margen">
   <div id="logo">WOLD 
   <div id="logob"> COMUNICACIONES</div>
   <div id="nit">Nit. 81.720.483-8</div>
   </div>
    <table id="encabezado"  cellspacing="0" width="100%">
       <thead>
            <tr>
               <th colspan="4"><div id="logob">RECIBO DE VENTA</div></th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($consultaventa);$i++): ?>
                <tr>
                    <td colspan="2">No. venta: <?= $consultaventa[$i]['numero_venta'] ?></td>                    
                    <td colspan="2" align="right">Fecha: <?= $consultaventa[$i]['fecha'] ?></td>
                </tr>
                <tr> 
                    <td colspan="3">Atendido por: <?= $consultaventa[$i]['empleado'] ?></td>                    
                    </tr>
                    </tr><tr>                                       
                    <td colspan="3">Cliente: <?= $consultaventa[$i]['cliente'] ?></td>                   
                    </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <table id="recibo"  cellspacing="0" width="100%">
       <thead>
            <tr>
                <!--<th>Referencia</th>-->
                <td>Desc.</td>
                <td>Valor Uni.</td>
                <td>Cant.</td>
                <td>Subtotal Venta</td>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($consultaventaproducto);$i++): ?>
                <tr>
                    <!--<td data-title='referencia'><?= $consultaventaproducto[$i]['referencia'] ?></td>-->
                    <td data-title='referencia'><?= $consultaventaproducto[$i]['referencia'] ?></td>
                    <td data-title='precio'>$ <?= number_format($consultaventaproducto[$i]['valor']) ?></td>
                    <td data-title='cantidad'><?= $consultaventaproducto[$i]['cantidad']*(-1) ?></td> 
                    <td data-title='subtotal'>$ <?= number_format($consultaventaproducto[$i]['SUBTOTAL']) ?></td> 
                        <?php $total += $consultaventaproducto[$i]['SUBTOTAL'] ?>
                </tr>
            <?php endfor; ?>        
                <tr id="der">
                    <th colspan="2"></th> 
                    <th colspan="2">Valor Total: &nbsp;&nbsp;&nbsp;$ <?= number_format($total) ?> </th>
                </tr>
        </tbody>
    </table>
    <div id="pie">    
     Tel. 861 25 05 - Cel. 313 382 32 55<br>    
    Cra 13 No. 10-110 
</div> 
</div><!--cierre div margen-->
<button id="boton" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-print" onclick="javascript:window.print()"> Imprimir</span></button> 
