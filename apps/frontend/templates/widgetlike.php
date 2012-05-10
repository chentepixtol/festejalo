<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php if(has_slot('description')): ?>
        <meta name="description" content="<?php include_slot('description')?>" />
    <?php endif; ?>
    <?php if(has_slot('title')): ?>
        <title>
            <?php include_slot('title')?>
        </title>
    <?php else: ?>
        <?php include_title() ?>
    <?php endif; ?>
    <link rel="stylesheet" type="text/css" href="/css/widgetlike.min.css" />
</head>
<body>
	
<div class="panel">
    <div id="top_panel">
        <div class="panel_wrap">
        	
			<?php if(has_component_slot('topbar')):?>
					 <?php include_component_slot('topbar')?>     
		    <?php endif;?>
			
         </div>
    </div>
    <div class="sub_panel">
        <a href="#" id="panel_toggle">Visitante</a>
    </div>
</div>

	
<div id="bg1">
	<div id="header">
		 <h1 id="title"><a href="<?php echo url_for('homepage')?>"><?php echo sfConfig::get('app_page_title')?><sup></sup></a></h1>
		 <h2 id="slogan"><?php echo sfConfig::get('app_page_slogan')?></h2>
	</div>
	<!-- end #header -->
</div>
<!-- end #bg1 -->
<div id="bg2">
	<div id="header2">
	<div id="slide">
	   <?php include_partial('global/menu_widgetlike')?>
		<div id="search">
			<form method="get" action="<?php echo url_for('buscar/index')?>">
				<fieldset>
				<input type="text" name="query" id="query" class="text" />
				<input type="submit" value="Buscar" class="button" />
				</fieldset>
			</form>
		</div>
		<!-- end #search -->
	</div>
	</div>
	<!-- end #header2 -->
</div>
<!-- end #bg2 -->
<div id="bg3">
	<div id="bg4">
		<div id="bg5">
			<div id="page">
				<p id="slot_breadcum">
				<?php if(has_slot('breadcum')): ?>
				   <?php include_slot('breadcum') ?>
				<?php endif;?>
				</p>
				<div id="content">
					<div class="post">
						<div class="title">
						  <h2 id="slot_pagetitle">
						     <?php if(has_slot('pagetitle')):?>
							    <?php include_slot('pagetitle')?>
							 <?php endif;?>
						  </h2>
							<?php if(has_slot('fecha')):?>
							  <p><?php include_slot('fecha')?></p>
							<?php endif;?>
						</div>
						<div class="entry"> 
						   <div id="main_content">
                              <?php echo $sf_content ?>
                           </div>
						</div>
					</div>
				</div>
				<!-- end #content -->
				<div id="sidebar">
					<ul>
						
					    <?php if(has_component_slot('sidebar1')):?>
					      <li>
					        <?php include_component_slot('sidebar1')?>
					      </li>
					    <?php endif;?>
						
						<?php if(has_component_slot('sidebar2')):?>
					      <li>
					        <?php include_component_slot('sidebar2')?>
					      </li>
					    <?php endif;?>
						
						<?php if(has_component_slot('sidebar3')):?>
					      <li>
					        <?php include_component_slot('sidebar3')?>
					      </li>
					    <?php endif;?>
						
					</ul>
				</div>
				<!-- end #sidebar -->
				<div style="clear: both; height: 40px;">&nbsp;</div>
			</div>
			<!-- end #page -->
		</div>
	</div>
</div>
<!-- end #bg3 -->
<div id="footer">
	<p><?php echo sfConfig::get('app_page_credits')?></p>
</div>
<!-- end #footer -->
<script type="text/javascript" src="/js/mootools-1.2.2-core-yc.js"></script>
<script type="text/javascript" src="/js/clientcide.js"></script>
<script type="text/javascript" src="/js/plugins.js"></script>
<script type="text/javascript" src="/js/fonacot.js"></script>
<!--
<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&key=<?php echo sfConfig::get('app_maps_api_key')?>"></script>
-->
<?php if(has_slot('script')):?>
  <?php include_slot('script')?>
<?php endif;?>

</body>
</html>
