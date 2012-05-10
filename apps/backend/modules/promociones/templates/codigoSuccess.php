<table>
<thead>
  <tr>
     <th>Promoción</th>
     <th>Nombre del Visitante</th>
     <th>Codigo de Verificación</th>
  </tr>
</thead>

<?php foreach($vis_cupones as $vis_cupon):?>

<tr>  
  <td><?php echo $vis_cupon->getCupon()->getTitulo()?></td>

  <td><?php echo $vis_cupon->getVisitante()->getNombre()?></td>
  
  <td><?php echo $vis_cupon->getCodigo()?></td>
</tr>
  
<?php endforeach;?>

</table>