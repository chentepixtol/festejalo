<p><?php echo $producto->getNombre()?></p>
<p><?php echo $producto->getDescripcion() ?></p><br />

<a href="<?php echo $producto->getUrlFoto()?>" rel="lightbox" title="<?php echo $producto->getDescripcion()?>">
<img alt="<?php echo $producto->getNombre()?>" src="<?php echo $producto->getUrlMiniatura() ?>" />
</a>
