<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en"><head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
 
  <?php if(has_slot('description')): ?>
        <meta name="description" content="<?php include_slot('description')?>" />
  <?php endif; ?>
 
  <?php if(has_slot('title')): ?>
        <title><?php include_slot('title')?></title>
  <?php else: ?>
        <?php include_title() ?>
  <?php endif; ?>
  
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="/css/layout5_setup.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="/css/layout5_text.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="/css/multiflex_main.css" />
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico" />
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

<body unload="GUnload()">

  <!-- Main Page Container -->
  <div class="page-container">

    <!-- For alternative headers START PASTE here -->

    <!-- A. HEADER -->      
    <div class="header">
      
      <!-- A.1 HEADER TOP -->
      <div class="header-top">
        
        <!-- Sitelogo and sitename -->
        <a class="sitelogo" href="#" title="Go to Start page"></a>
        <div class="sitename">
          <h1><a href="<?php echo url_for('homepage')?>"><?php echo sfConfig::get('app_page_title')?></a></h1>
          <h2><?php echo sfConfig::get('app_page_slogan')?></h2>
        </div>
    
        <!-- Navigation Level 0 -->
        
        <!-- Navigation Level 1 -->
        <div class="nav1">
          <ul>
            <li><a href="#" title="Go to Start page">Home</a></li>
            <li><a href="#" title="Get to know who we are">About</a></li>
            <li><a href="#" title="Get in touch with us">Contact</a></li>																		
            <li><a href="<?php echo url_for('visitante/salir')?>" title="Cerrar sesion">Salir</a></li>
          </ul>
        </div>              
      </div>
      
      <!-- A.2 HEADER MIDDLE -->
      <div class="header-middle">    
   
        <!-- Site message -->
        <div class="sitemessage">
        	<?php echo sfConfig::get('app_page_message')?>
        </div>        
      </div>
      
      <!-- A.3 HEADER BOTTOM -->
      <div class="header-bottom">
        <!-- Navigation Level 2 (Drop-down menus) -->
        <?php include_partial('global/menu_multiflex')?>
	  </div>

      <!-- A.4 HEADER BREADCRUMBS -->

      <!-- Breadcrumbs -->
      <div class="header-breadcrumbs">
		
		<ul id="slot_breadcum">
            <?php if(has_slot('breadcum')): ?>
			   <?php include_slot('breadcum') ?>
		    <?php endif;?>
        </ul>

        <!-- Search form -->                  
        <div id="search" class="searchform">
			<form method="get" action="<?php echo url_for('buscar/index')?>">
				<fieldset>
				<input type="text" name="query" id="query" class="text" />
				<input type="submit" value="Buscar" class="button" />
				</fieldset>
			</form>
		</div>
		
      </div>
    </div>

    <!-- For alternative headers END PASTE here -->

    <!-- B. MAIN -->
    <div class="main">
 
      <!-- B.3 SUBCONTENT -->
      <div class="main-subcontent">

        <!-- Subcontent unit -->
        <?php if(has_component_slot('sidebar3')): ?>
            <?php include_component_slot('sidebar3')?>
		<?php endif;?>
		
		<!-- Subcontent unit -->
		<?php if(has_slot('logo')):?>
		    <div class="subcontent-unit-border-blue">
               <div class="round-border-topleft"></div><div class="round-border-topright"></div>
               <h1 class="blue">Logo</h1>
               <?php include_slot('logo')?>
            </div>
        <?php endif; ?>
				
        <!-- Subcontent unit -->
        <?php if(has_component_slot('sidebar4')): ?>
          <?php include_component_slot('sidebar4')?>
		<?php endif;?>

        <!-- Noticias -->
        <?php if(has_component_slot('sidebar5')):?>			      
			 <?php include_component_slot('sidebar5')?>
        <?php endif;?>
        

      </div>        
 
      <!-- B.1 MAIN CONTENT -->
      <div class="main-content">
        
        <!-- Pagetitle -->
				
        <h1 class="pagetitle" id="slot_pagetitle">
        	<?php if(has_slot('pagetitle')):?>
			      <?php include_slot('pagetitle')?>
			<?php endif;?>
			<?php if(has_slot('fecha')):?>
				  <span><?php include_slot('fecha')?></span>
			<?php endif;?>
		</h1>
		
		<!-- Banners de Segmentos -->
		<?php if(has_component_slot('banners_segmentos')):?>
			<div class="column1-unit">
				<?php include_component_slot('banners_segmentos', array('slot_segmento' => $sf_params->get('slot')) )?>
			</div>
		<?php endif;?>
		
		<!-- Banners de Categorias -->
		<?php if(has_component_slot('banners_categorias')):?>
			<div class="column1-unit">
				<?php include_component_slot('banners_categorias', array('slot_categoria' => $sf_params->get('slot')) )?>
			</div>
		<?php endif;?>
		
        <!-- Content unit - One column -->
        
        <div class="column1-unit" id="main_content">
        
            <?php echo $sf_content ?>
          
        </div> 
                 
        <hr class="clear-contentunit" />
                    
        
      </div>
      
      <!-- B.1 MAIN NAVIGATION -->
      <div class="main-navigation">
      	
        <!-- Sidebar 1 -->
        <div class="round-border-topleft"></div>
        <h1 class="first">Mapa</h1>
		<?php include_component('maps','global',array(
		  'width' => 293
		 ))?>
		
		
		<?php if(has_component_slot('sidebar1')):?>			      
			<?php include_component_slot('sidebar1')?>
        <?php endif;?>

        <?php if(has_component_slot('sidebar2')):?>
		    <?php include_component_slot('sidebar2')?>
	    <?php endif;?>
     	                        

      </div>
    </div>
      
    <!-- C. FOOTER AREA -->      

    <div class="footer">
        <p class="credits"><?php echo sfConfig::get('app_page_credits')?></p>
    </div>      
  </div> 

<script type="text/javascript" src="/js/mootools-1.2.2-core-yc.js"></script>
<script type="text/javascript" src="/js/clientcide.js"></script>
<script type="text/javascript" src="/js/plugins.js"></script>
<script type="text/javascript" src="/js/noobSlide.pack.js"></script>
<script type="text/javascript" src="/js/fonacot.js"></script>

<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&key=<?php echo sfConfig::get('app_maps_api_key')?>"></script>
<script type="text/javascript" src="/js/modules/maps.js"></script>


<!-- Scripts Adicionales -->

<?php if(has_slot('script')):?>
  <?php include_slot('script')?>
<?php endif;?>

<?php if(has_slot('script1')):?>
  <?php include_slot('script1')?>
<?php endif;?>

<?php if(has_slot('script2')):?>
  <?php include_slot('script2')?>
<?php endif;?>

</body>
</html>
