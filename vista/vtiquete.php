<?php
    include('modelo/mconsulta.php');
    $st = new Mconsulta();
?>
<link rel="stylesheet" href="css/impreso.css"/>
<link rel="stylesheet" href="css/impreso.css" media="print"/>
<link href='https://fonts.googleapis.com/css?family=BenchNine:400,700' rel='stylesheet' type='text/css'>
<?php
$consultast          = $st->consultarServicioTec();
$idprint             = $consultast[0]['numero_orden'];
//echo $idprint;

?>
<div id="logo">WOLD
  <div id="logob">COMUNICACIONES</div>
   <div id="nit">Nit. 81.720.483-8</div>
   </div>
    <table id="encabezado"  cellspacing="0" width="100%">
      <thead>
            <tr>
                <th colspan="2">Wilson Diaz Tecnico Profesional <br> woldcomunicaciones@hotmail.com</th>
            </tr>
            <tr>
               <th colspan="2"><div id="logob">ORDEN DE SERVICIO TECNICO</div></th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($consultast);$i++): ?>
                <tr>
                    <td>No. Orden:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['numero_orden'] ?></td>
                    <td align="right">Fecha: <?= $consultast[$i]['fecha'] ?></td>
                </tr>
                 <tr>
                    <td colspan="2">Recibido Por:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['empleadonombre'] ?></td>
                </tr>
                <tr>
                  <td colspan="2">Cliente: <?= $consultast[$i]['clientenombre'] ?></td>
                </tr>
                <tr>
                  <td colspan="2">Teléfono: <?= $consultast[$i]['clientetelefono'] ?></td>
                </tr>
                <tr>
                    <td colspan="2">Tipo Dispositivo: <?= $consultast[$i]['dispositivo'] ?></td>
                </tr><tr>
                    <td colspan="2">Marca:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['marca'] ?></td>
                </tr><tr>
                    <td colspan="2">Referencia:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['referencia'] ?></td>
                </tr><tr>
                    <td colspan="2">Descripcion:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['descripcion_st'] ?></td>
                </tr><tr>
                    <td colspan="2">Observacion:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['observacion'] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    <div id="patron">
        <br><img src="img/circulos_3d.png" width="260px" height="auto"><br><br>
        <img src="img/codigo.svg" width="260" height="auto"><br><br>
    </div>
 <div id="logo">WOLD
  <div id="logob">COMUNICACIONES</div>
   <div id="nit">Nit. 81.720.483-8</div>
   </div>
    <table id="encabezado"  cellspacing="0" width="100%">
      <thead>
            <tr>
                <th colspan="2">Wilson Diaz Tecnico Profesional <br> woldcomunicaciones@hotmail.com</th>
            </tr>
            <tr>
               <th colspan="2"><div id="logob">ORDEN DE SERVICIO TECNICO</div></th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($consultast);$i++): ?>
                <tr>
                    <td>No. Orden:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['numero_orden'] ?></td>
                    <td align="right">Fecha: <?= $consultast[$i]['fecha'] ?></td>
                </tr>
                 <tr>
                    <td>Recibido Por:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['empleadonombre'] ?></td>
                </tr>
                <tr>
                  <td>Cliente: <?= $consultast[$i]['nombrecliente'] ?></td>
                </tr>
                <tr>
                    <td colspan="2">Tipo Dispositivo: <?= $consultast[$i]['dispositivo'] ?></td>
                </tr><tr>
                    <td colspan="2">Marca:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['marca'] ?></td>
                </tr><tr>
                    <td colspan="2">Referencia:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['referencia'] ?></td>
                </tr><tr>
                    <td colspan="2">Descripcion:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['descripcion_st'] ?></td>
                </tr><tr>
                    <td colspan="2">Observacion:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['observacion'] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
<div id="clausula">
    Nota: Después de 30 días WOLD Comunicaciones cobrará $200 diarios por bodegaje y NO se hace responsable por ningún aparato
    y automaticamente al mismo procedera a rematarlo, para poder recuperar el costo de revision, reparacion y repuestos. WOLD Comunicaciones NO ofrece ninguna clase de garantia por repuestos, ya que estos se compran sin garantia. La garantia solo incluye
    la mano de obra y el tiempo estipulado por el tecnico. WOLD Comunicaciones NO responde por perdidas ocasionales causadas por incendios o casos fortuitos. Este recibo se asimila en todos sus efectos a una letra de cambio (segun Art. 3 y 2057 del Codigo de Comercio)
</div>
<div id="pie">
     Tel. 861 25 05 - Cel. 313 382 32 55<br>
    Cra 13 No. 10-110
</div>
<button id="boton" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-print" onclick="javascript:window.print()"> Imprimir</span></button>
<!--<div id="prueba">
<table id="prueba2">
<tbody>
            <?php for($i=0;$i<count($consultast);$i++): ?>
                <tr>
                    <td>No. Orden:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['numero_orden'] ?></td>
                    <td>Fecha: <?= $consultast[$i]['fecha'] ?></td>
                </tr>
                 <tr>
                    <td>Recibido Por:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['empleado'] ?></td>
                    <td>Cliente: <?= $consultast[$i]['id_cliente'] ?></td>
                </tr>
                <tr>
                    <td>Descripcion:&nbsp;&nbsp;&nbsp; <?= $consultast[$i]['descripcion_st'] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
</table>
<img src="img/circulos.jpg"><br>
<img src="img/rectangulo.jpg">
</div>-->
<script type="text/javascript">
function printDiv(prueba) {
     var printContents = document.getElementById(prueba).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<!--<button id="boton" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-print" onclick="printDiv('prueba')"> Imprimir</span></button> -->
