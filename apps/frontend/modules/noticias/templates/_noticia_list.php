<li>
  <p>
    <a href="<?php echo url_for('show_noticia',$noticia) ?>" class="ajax" > <?php echo $noticia->getTitulo() ?></a>
    fecha: <?php echo $noticia->getFechaPublicacion() ?>
  </p>
</li>

