<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('general/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?empresa_id='.$form->getObject()->getEmpresaId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('general/index') ?>">Regresar</a>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['telefono']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefono']->renderError() ?>
          <?php echo $form['telefono'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fax']->renderLabel() ?></th>
        <td>
          <?php echo $form['fax']->renderError() ?>
          <?php echo $form['fax'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['sitio_web']->renderLabel() ?></th>
        <td>
          <?php echo $form['sitio_web']->renderError() ?>
          <?php echo $form['sitio_web'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
