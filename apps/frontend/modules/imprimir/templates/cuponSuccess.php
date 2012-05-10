<table>
<?php foreach($vis_cupones as $vis_cupon):?>
<tr>
     <td>Promoción: </td>
     <td> <?php echo $vis_cupon->getCupon()->getTitulo()?></td>
</tr>
<tr>
     <td>Descripción: </td>
     <td> <?php echo $vis_cupon->getCupon()->getDescripcion()?></td>
</tr>
<tr>     
     <td>Codigo de Verificación: </td>
     <td><?php echo $vis_cupon->getCodigo()?></td>
</tr>
<?php endforeach;?>
</table>