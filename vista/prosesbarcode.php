 <?php
 include 'bar128.php';
 /*
 echo '<div style="border:3px double #ababab; padding:20px;margin:5px auto;width:100px;">';
 echo bar128(stripslashes($_POST['bar']));
 echo '</div>'; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 echo '<button style="texk-align: center" onclick="goBack()">atras</button>';
 ?>
*/?>
<script src="../js/jquery-1.12.3.min.js"></script>
<link rel="stylesheet" href="../css/impreso.css"/>
<link rel="stylesheet" href="../css/impreso.css" media="print"/>
<table id="barra1">
    <tr>
        <td> &nbsp;&nbsp;&nbsp;</td><td><?= bar128(stripslashes($_POST['bar']));?></td> <td class="barra2"><button id="boton"onclick="goBack()">atras</button></td>
        <td><?= bar128(stripslashes($_POST['bar']));?></td> <td class="barra2"><button id="boton" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-print" onclick="javascript:window.print()"> Print</span></button> </td>
        <td><?= bar128(stripslashes($_POST['bar']));?></td> <td></td>
    </tr>
</table>
<!--
<button id="boton"onclick="goBack()">atras</button>
<button id="boton" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-print" onclick="javascript:window.print()"> Imprimir</span></button> -->
<script>
function goBack() {
    window.history.back();
}
</script>
