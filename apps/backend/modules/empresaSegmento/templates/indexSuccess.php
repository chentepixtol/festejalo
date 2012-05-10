<h1>Segmentos</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Segmento</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($empresa_segmento_list as $empresa_segmento): ?>
    <tr>
      <td><a href="<?php echo url_for('empresaSegmento/edit?id='.$empresa_segmento->getId()) ?>"><?php echo $empresa_segmento->getId() ?></a></td>
      <td><?php echo $empresa_segmento->getSegmento() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('empresaSegmento/new') ?>">Nuevo</a>
