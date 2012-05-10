<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<style>
  th { text-align: right; }
</style>
<form action="<?php echo url_for('ubicacion/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?empresa_id='.$form->getObject()->getEmpresaId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('ubicacion/index') ?>">Regresar</a>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['calle']->renderLabel() ?></th>
        <td>
          <?php echo $form['calle']->renderError() ?>
          <?php echo $form['calle'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['numero']->renderLabel() ?></th>
        <td>
          <?php echo $form['numero']->renderError() ?>
          <?php echo $form['numero'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['colonia']->renderLabel() ?></th>
        <td>
          <?php echo $form['colonia']->renderError() ?>
          <?php echo $form['colonia'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['codigo_postal']->renderLabel() ?></th>
        <td>
          <?php echo $form['codigo_postal']->renderError() ?>
          <?php echo $form['codigo_postal'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['delegacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['delegacion']->renderError() ?>
          <?php echo $form['delegacion'] ?>
        </td>
      </tr>
      <tr>
        <th>Estación del metro mas cercana</th>
        <td>
          <?php echo $form['metro']->renderError() ?>
          <?php echo $form['metro'] ?>
        </td>
      </tr>
      
      <tr>
        <th><?php echo $form['estado_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['estado_id']->renderError() ?>
          <?php echo $form['estado_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['latitud']->renderLabel() ?></th>
        <td>
          <?php echo $form['latitud']->renderError() ?>
          <?php echo $form['latitud'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['longitud']->renderLabel() ?></th>
        <td>
          <?php echo $form['longitud']->renderError() ?>
          <?php echo $form['longitud'] ?>
          <input id="button_gmaps" type="button" value="Calcular Coordenadas" />
        </td>
      </tr>
    </tbody>
  </table>
</form>
