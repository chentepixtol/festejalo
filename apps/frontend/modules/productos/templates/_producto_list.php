    <li>
      <div>
        <a href="<?php echo url_for('show_producto',$producto)?>">
          <?php echo $producto->getNombre()?>
        </a>
        <img src="<?php echo $producto->getUrlMiniatura()?>" alt="<?php echo $producto->getNombre()?>"  />
      </div>
      
    </li>