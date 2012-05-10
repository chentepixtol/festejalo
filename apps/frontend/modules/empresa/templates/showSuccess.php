<?php slot('title', sfConfig::get('app_page_title') . " - " . $empresa)?>
<?php slot('description', $empresa->getDescription())?>
<?php Fonacot::start()?>
  <a href="<?php echo url_for('@homepage') ?>">Inicio</a>  >> 
  <a href="<?php echo url_for('empresas/listado')?>" class="ajax">Empresas</a> >>
  <?php echo $empresa->getNombre()?>
<?php $breadcum = Fonacot::stop()?>

<div id="empresa_page">
	<div id="menu_images"> 
	  <a href="<?php echo url_for('list_producto', $empresa)?>" class="tip ajax" title="Productos" rel="Catalogo de Productos."><img src="/images/productos.png" alt="Productos" /></a>
	  <a href="<?php echo url_for('list_noticia', $empresa)?>" class="tip ajax" title="Noticias" rel="Ultimas Noticias."><img src="/images/noticias.png" alt="Noticias" /></a>
	  <a href="<?php echo url_for('list_banner', $empresa)?>" class="tip ajax" title="Anuncios" rel="Visualice los Anuncios Publicitarios."><img src="/images/anuncios.png" alt="Anuncios" /></a>
	  <a href="<?php echo url_for('show_empresa',$empresa)?>/imprimir" class="tip" title="Impresión" rel="Versión para Imprimir"><img src="/images/imprimir.png" title="imprimir"></a>
	</div>
	
    <div id="empresa_descripcion">
        <div class="subtitulo">
            Descripción:
        </div>
        <p>
            <?php echo $empresa->getDescripcion()?>
        </p>
		<div class="subtitulo">
            Afiliación de Fonacot:
        </div>
        <p>
            <?php echo $empresa->getAfiliacionFonacot()?>
        </p>
    </div>
	
	<?php if(!empty($ubicacion)):?>
    <div class="subtitulo">
        Dirección: 
		<a href="<?php echo url_for('maps',$empresa)?>" rel="box"><span>( Mapa detallado )</span></a>
    </div>
    <?php include_partial('maps/ubicacion',array('ubicacion'=>$ubicacion)) ?>
    <?php endif;?>
	
    <div class="subtitulo">
		<a href="<?php echo url_for('tramite', $empresa)?>" rel="box">Documentación y Tramites para adquirir un crédito</a>
	</div>
	
    <?php if(!empty($micrositio)):?>
    <?php slot('logo')?>
	    <div id="empresa_logo">
            <a href="<?php echo $micrositio->getUrlLogo()?>" rel="lightbox" title="logo de <?php echo $empresa->getNombre()?>">
               <img src="<?php echo $micrositio->getUrlMiniLogo()?>" alt="logo de <?php echo $empresa->getNombre()?>" />
            </a>
        </div>
	<?php end_slot()?>
    <div id="empresa_micrositio">
        <div class="subtitulo">
            Quienes Somos:
        </div>
        <p>
            <?php echo $micrositio->getQuienesSomos()?>
        </p>
        <div class="subtitulo">
            Misión: 
        </div>
        <p>
            <?php echo $micrositio->getMision()?>
        </p>
        <div class="subtitulo">
            Visión: 
        </div>
        <p>
            <?php echo $micrositio->getVision()?>
        </p>
    </div>
	
    <?php endif;?>
    <?php if(!empty($info_general)):?>
    <div id="empresa_general">
        <div class="subtitulo">
            Información General
        </div>
        <ul>
            <li>
                Sitio Web: 
                <a href="<?php echo $info_general->getSitioWeb()?>"><?php echo $info_general->getSitioWeb()?></a>
            </li>
            <li>
                E-mail: 
                <a href="mailto:<?php echo $info_general->getEmail()?>"><?php echo $info_general->getEmail()?></a>
            </li>
            <li>
                Telefono: 
                <?php echo $info_general->getTelefono()?>
            </li>
            <li>
                Fax: 
                <?php echo $info_general->getFax()?>
            </li>
        </ul>
    </div>
    <?php endif;?>

	<div class="subtitulo">
        Promociones:
    </div>
	<?php foreach($promociones as $promocion):?>
    <div>
        <p>
		    <?php echo $promocion->getTitulo()?>
            <?php echo $promocion->getDescripcion()?>
			<a href="<?php echo url_for('visitante/cupones')?>?cupon=<?php echo $promocion->getId()?>">Utilizar</a>
        </p>
        
    </div>
    <?php endforeach;?>

    <hr/>
</div>

<?php include_partial('global/ajax_request', array(
  'pagetitle' => $empresa->getNombre(),
  'breadcum' => $breadcum,
))?>