<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('tramite/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?empresa_id='.$form->getObject()->getEmpresaId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('tramite/index') ?>">Regresar</a>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['recepcion_del_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['recepcion_del_credito']->renderError() ?>
          <?php echo $form['recepcion_del_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['recepcion_del_tramite']->renderLabel() ?></th>
        <td>
          <?php echo $form['recepcion_del_tramite']->renderError() ?>
          <?php echo $form['recepcion_del_tramite'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['persona_encargada']->renderLabel() ?></th>
        <td>
          <?php echo $form['persona_encargada']->renderError() ?>
          <?php echo $form['persona_encargada'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['horario']->renderLabel() ?></th>
        <td>
          <?php echo $form['horario']->renderError() ?>
          <?php echo $form['horario'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['procedimiento']->renderLabel() ?></th>
        <td>
          <?php echo $form['procedimiento']->renderError() ?>
          <?php echo $form['procedimiento'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['documentacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['documentacion']->renderError() ?>
          <?php echo $form['documentacion'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
