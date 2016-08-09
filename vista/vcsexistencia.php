<?php 

    /*  
        *   @Version: V1.1 04/08/16
    */

    include 'estilos.php'; 
    include 'modelo/mconsulta.php'; 
    $existencia = new Mconsulta();
?>

<div class="etinfo">Informe Existencia</div>

<?php $consultexistencia = $existencia->consultarExistencia(); ?>
	<table id="" class="display" cellspacing="0" width="100%">
	   <thead>
            <tr>
                <th colspan="12">Existencias</th>
            </tr>
            <tr>
                <th>Código</th>
                <th>Referencia</th>
                <th>Descripcion</th>
                <th>Tipo de dispositivo</th>
                <th>Marca</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Ubicacion</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($consultexistencia);$i++): ?>
                <tr>
                    <td data-title='Codigo'><?= $consultexistencia[$i]['idcodigo'] ?></td>
                    <td data-title='Referencia'><?= $consultexistencia[$i]['referencia'] ?></td>
                    <td data-title='Descripción'><?= $consultexistencia[$i]['descripcion'] ?></td>
                    <td data-title='Tipo de Dispositivo'><?= $consultexistencia[$i]['tipo'] ?></td>
                    <td data-title='Marca'><?= $consultexistencia[$i]['marca'] ?></td>
                    <td data-title='Precio'>$ <?= number_format($consultexistencia[$i]['precio'])?></td>
                    <td data-title='Ubicacion'><?= $consultexistencia[$i]['ubicacion'] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table> 

<!-- 
    * Script para el selector de el menu principal
-->

<script type="text/javascript">
    $(document).ready(function() {

        var txt = $(this).text();

        if (txt < 3) {
            $(this).css("color", "red");
        } else if(txt < 6){
            $(this).css("color", "orange");
        }
        else{
            $(this).css("color", "green");
        }

        });

    });
</script>