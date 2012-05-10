<?php slot('pagetitle',"Publicidad")?>

<table>
  <thead>
    <tr>
      <th>Titulo</th>
      <th>Texto</th>
      <th>Banner</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($banner_list as $banner): ?>
    <tr>
      <td><a href="<?php echo url_for('anuncio/edit?id='.$banner->getId()) ?>"><?php echo $banner->getTitulo() ?></a></td>
      <td><?php echo $banner->getTexto() ?></td>
      <td><img src="<?php echo $banner->getImagenUrl()?>" alt="<?php echo $banner->getTitulo()?>" /></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('anuncio/new') ?>">Nuevo</a>
