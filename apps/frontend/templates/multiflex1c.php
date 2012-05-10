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
  
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="/css/layout1_setup.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="/css/layout5_text.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="/css/multiflex_main.css" />
  <style type="text/css">
    #menu_images {
    	display: none;
    }
  </style>
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico" />
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

<body>

  <!-- Main Page Container -->
  <div class="page-container">


    <!-- B. MAIN -->
    <div class="main">
 
 
      <!-- B.1 MAIN CONTENT -->
      <div class="main-content">
        <br /><br />
        <!-- Pagetitle -->
				
        <h1 class="pagetitle" id="slot_pagetitle">
        	<?php if(has_slot('pagetitle')):?>
			      <?php include_slot('pagetitle')?>
			<?php endif;?>
			<?php if(has_slot('fecha')):?>
				  <p><?php include_slot('fecha')?></p>
			<?php endif;?>
		</h1>

        <!-- Content unit - One column -->
        
        <div class="column1-unit" id="main_content">
        
            <?php echo $sf_content ?>
          
        </div> 
                 
        <hr class="clear-contentunit" />
                    
        
      </div>
      
    </div>
      
    <!-- C. FOOTER AREA -->      

    <div class="footer">
        <p class="credits"><?php echo sfConfig::get('app_page_credits')?></p>
    </div>      
  </div> 

<!--
<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&key=<?php echo sfConfig::get('app_maps_api_key')?>"></script>
-->

<?php if(has_slot('script')):?>
  <?php include_slot('script')?>
<?php endif;?>

</body>
</html>
