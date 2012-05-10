<?php slot('pagetitle',"Formulario de Registro")?>
<form action="<?php echo url_for('registro/verifica') ?>" method="post" >
<table>

  <?php echo $form ?>

  <tr>
  <td>
    <input type="submit" value="Enviar" />
  </td>
  </tr>
  
</table>
</form>