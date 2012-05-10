<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('sitio/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?empresa_id='.$form->getObject()->getEmpresaId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;
          
          <input type="submit" value="Guardar" />
              <div class="meta">
				<p class="links"><a href="<?php echo url_for('sitio/index') ?>" class="more">Regresar</a></p>
			  </div>
        
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['quienes_somos']->renderLabel() ?></th>
        <td>
          <?php echo $form['quienes_somos']->renderError() ?>
          <?php echo $form['quienes_somos'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mision']->renderLabel() ?></th>
        <td>
          <?php echo $form['mision']->renderError() ?>
          <?php echo $form['mision'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['vision']->renderLabel() ?></th>
        <td>
          <?php echo $form['vision']->renderError() ?>
          <?php echo $form['vision'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['logo']->renderLabel() ?></th>
        <td>
          <?php echo $form['logo']->renderError() ?>
          <?php echo $form['logo'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
