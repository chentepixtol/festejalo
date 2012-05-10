<ol>
<?php foreach($visitante_cupones as $vis_cupon):?>
  <li>
     <?php echo $vis_cupon->getCupon()->getTitulo()?>
     <?php echo $vis_cupon->getCupon()->getDescripcion()?>
     <a href="<?php echo url_for('imprimir/cupon')?>?cupon=<?php echo $vis_cupon->getCuponId()?>">
       Imprimir
     </a>
  
  </li>
<?php endforeach;?>
</ol>