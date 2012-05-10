
<?php slot('pagetitle',"Empresa")?>

<table>
  <tbody>
    <?php foreach ($empresa_list as $empresa): ?>
    <tr>
      <td><a href="<?php echo url_for('empresa/edit?id='.$empresa->getId()) ?>"><?php echo $empresa->getNombre() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php if($num_emp == 0):?>
  <a href="<?php echo url_for('empresa/new') ?>">Nueva Empresa</a>
<?php endif;?>