<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <script type="text/javascript" src="/js/mootools-1.2.2-core-yc.js"></script>
</head>
<body>

<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="<?php echo url_for('@homepage') ?>"><?php echo sfConfig::get('app_portal_nombre')?><sup></sup></a></h1>
		<h2><?php echo sfConfig::get('app_portal_slogan')?></h2>
	</div>
	<div id="menu">
		<?php if($sf_user->hasCredential('Administrador')): ?>
		  <?php echo include_partial('global/menu_administrador') ?>
		<?php elseif($sf_user->hasCredential('Basico') || $sf_user->hasCredential('Intermedio') ||$sf_user->hasCredential('Avanzado')):  ?>
		  <?php echo include_partial('global/menu_usuario') ?>
		<?php endif; ?>
	</div>
</div>
<!-- end header -->

<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
	
		<div class="post">
			<?php if(has_slot('pagetitle')): ?>
			<h2 class="title"><?php include_slot('pagetitle')?></h2>
            <?php endif; ?>
			<div class="entry">
			   
			   <?php echo $sf_content?>
			   
			</div>
			<br />
		</div>
	
	</div>
	<!-- end content -->
	
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<p id="legal"><?php echo sfConfig::get('app_portal_creditos') ?> 
	<a href="<?php echo url_for('home/salir')?>">Salir</a>
	</p>
</div>
<!-- end footer -->
</body>
</html>
