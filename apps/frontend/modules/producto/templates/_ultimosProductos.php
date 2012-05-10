<h1>Productos destacados</h1>
<?php foreach($productos as $producto): ?>
  <div class="producto" style="text-align: center;">
    <a href="<?php echo url_for('show_producto', $producto) ?>" class="tip" title="<?php echo $producto->getNombre()?>" rel="<?php echo $producto->getDescripcion()?>">
      <img src="<?php echo $producto->getUrlMiniatura()?>" alt="<?php echo $producto->getNombre()?>" style="float:none;" />
    </a>
  </div>
<?php endforeach;?>