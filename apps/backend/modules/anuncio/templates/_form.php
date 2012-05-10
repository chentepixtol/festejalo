<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('anuncio/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('anuncio/index') ?>">Regresar</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Borrar', 'anuncio/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Desea Borrar el Anuncio?')) ?>
          <?php endif; ?>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form?>
    </tbody>
  </table>
</form>
<script type="text/javascript">

window.addEvent('domready', function(){


	var banner_tipo_handler = function(){
		if( $('banner_tipo').get('value') == 2)
		{
			$('banner_segmento_id').removeProperty('disabled');
			$('banner_segmento_id').getParent('tr').setStyle('visibility','visible');
		}
		else
		{
			$('banner_segmento_id').getParent('tr').setStyle('visibility','hidden');
			$('banner_segmento_id').setProperty('disabled', 'true');
			$('banner_segmento_id').set('value','');
		}
		if($('banner_tipo').get('value') == 3)
		{
			$('banner_categoria_id').removeProperty('disabled');
			$('banner_categoria_id').getParent('tr').setStyle('visibility', 'visible');
		}
		else
		{
			$('banner_categoria_id').getParent('tr').setStyle('visibility', 'hidden');
			$('banner_categoria_id').setProperty('disabled', 'true');
			$('banner_categoria_id').set('value', '');
		}
	}

	banner_tipo_handler.run()

	$('banner_tipo').addEvent('change', banner_tipo_handler);
	
});

</script>