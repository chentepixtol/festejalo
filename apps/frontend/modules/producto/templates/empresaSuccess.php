<?php slot('title', sfConfig::get('app_page_title') . ' - Productos de ' . $empresa->getNombre())?>
<?php slot('description', "Productos de la empresa " . $empresa->getNombre())?>
<?php Fonacot::start()?>
  <a href="<?php echo url_for('@homepage') ?>">Inicio</a>  >> 
  <a href="<?php echo url_for('empresas/listado')?>" class="ajax">Empresas</a> >>
  <a href="<?php echo url_for('show_empresa',$empresa)?>" class="ajax" ><?php echo $empresa->getNombre()?></a> >>
  Productos
<?php $breadcum = Fonacot::stop()?>

<div id="gallery"> 
  <ul>
    <?php foreach ($list_productos as $producto): ?>
      <li>
         
        <a href="<?php echo $producto->getUrlFoto()?>" rel="lightbox[gallery]" title="<?php echo $producto->getDescripcion() ?>">
          <img src="<?php echo $producto->getUrlMiniatura() ?>" alt="<?php echo $producto->getNombre()?>" />
        </a>
          
        
      </li>
    <?php endforeach; ?>
    </ul>
 </div>

<?php include_partial('global/ajax_request', array(
  'pagetitle' => $empresa->getNombre() . " - Productos",
  'breadcum' => $breadcum,
))?> 