<h1>Productos</h1>

<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Imagen</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($producto_list as $producto): ?>
    <tr>
      <td><a href="<?php echo url_for('producto/edit?id='.$producto->getId()) ?>"><?php echo $producto->getNombre() ?></a></td>
      <td><?php echo $producto->getDescripcion() ?></td>
      <td><img src="<?php echo $producto->getUrlMiniatura()?>" alt="<?php echo $producto->getNombre()?>" /></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('producto/new') ?>">Nuevo</a>
