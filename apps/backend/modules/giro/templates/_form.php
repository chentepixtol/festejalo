<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('giro/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('giro/index') ?>">Regresar</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Borrar', 'giro/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '¿Esta seguro de eliminar la categoria?')) ?>
          <?php endif; ?>
          <input type="submit" value="Agregar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['categoria_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['categoria_id']->renderError() ?>
          <?php echo $form['categoria_id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
