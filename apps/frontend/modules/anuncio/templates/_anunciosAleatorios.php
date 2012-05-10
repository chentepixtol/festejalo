<h1>Anuncios destacados</h1>

<div class="mask">
  <div id="slide1" class="slide">
    <?php foreach($banners as $banner): ?>
      <span>
        <a href="<?php echo url_for('show_banner', $banner) ?>" class="tip" title="<?php echo $banner->getTitulo()?>" rel="<?php echo $banner->getTexto()?>">
          <img src="<?php echo $banner->getImagenUrl()?>" width="<?php echo sfConfig::get('app_banner_width')?>" height="<?php echo sfConfig::get('app_banner_height')?>" alt="<?php echo $banner->getTitulo()?>" style="float:none;" />
        </a>
      </span>
    <?php endforeach;?>
  </div>
</div>

