<?php if(!$sf_request->isXmlHttpRequest()): ?>
  <?php if(isset($pagetitle)):?>
    <?php slot('pagetitle', $pagetitle)?>
  <?php endif;?>
  <?php if(isset($breadcum)):?>
    <?php slot('breadcum', $breadcum)?>
  <?php endif;?>
<?php else:?>
  <?php if(isset($pagetitle)):?>
    <script type="text/javascript">
      $('slot_pagetitle').set('html','<?php echo $pagetitle?>');
    </script>
  <?php endif;?>
  <?php if(isset($breadcum)):?>
    <div style="display:none;" id="breadcum_slot_tmp"><?php echo $breadcum?></div>
    <script type="text/javascript">
      $('slot_breadcum').set('html', $('breadcum_slot_tmp').get('html'));
    </script>
  <?php endif;?>
<?php endif; ?>
