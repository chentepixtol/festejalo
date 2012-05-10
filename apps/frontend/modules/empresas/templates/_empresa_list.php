<li>
  <p><a href="<?php echo url_for('show_empresa', $empresa) ?>" class="AniLink ajax cache">
    <?php echo $empresa->getNombre() ?>
  </a></p>
  <p><?php echo $empresa->getDescripcion()?></p>
</li>
