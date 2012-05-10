<h1>Categorias de su Empresa</h1><br />


<ol>
    <?php foreach ($empresa_categoria_list as $empresa_categoria): ?>
      <li><?php echo $empresa_categoria->getCategoria() ?></li>
    <?php endforeach; ?>
</ol>

<a href="<?php echo url_for('giro/new') ?>">Nueva</a>
