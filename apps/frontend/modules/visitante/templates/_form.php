<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>


<form action="<?php echo url_for('visitante/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['username']->renderLabel() ?></th>
        <td>
          <?php echo $form['username']->renderError() ?>
          <?php echo $form['username'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['password']->renderLabel() ?></th>
        <td>
          <?php echo $form['password']->renderError() ?>
          <?php echo $form['password'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['apellidos']->renderLabel() ?></th>
        <td>
          <?php echo $form['apellidos']->renderError() ?>
          <?php echo $form['apellidos'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tarjeta_fonacot']->renderLabel() ?></th>
        <td>
          <?php echo $form['tarjeta_fonacot']->renderError() ?>
          <?php echo $form['tarjeta_fonacot'] ?>
        </td>
      </tr>
      <tr>
        <th>¿Desea recibir promociones de los distribuidores?</th>
        <td>
          <?php echo $form['promocion_list']->renderError() ?>
          <?php echo $form['promocion_list'] ?>
        </td>
      </tr>
      <tr>
        <td>
          <?php echo $form['captcha']->renderError() ?>
          <?php echo $form['captcha'] ?>
        </td>
        <td>
          <?php echo $form->renderHiddenFields() ?>
          <input type="submit" value="Registrar" />
        </td>
      </tr>
      
    </tbody>
  </table>
</form>
