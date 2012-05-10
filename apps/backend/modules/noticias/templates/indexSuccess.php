<h1>Noticias</h1>

<table>
  <thead>
    <tr>
      <th>Titulo</th>
      <th>Texto</th>
      <th>Fecha publicacion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($noticia_list as $noticia): ?>
    <tr>
      <td><a href="<?php echo url_for('noticias/edit?id='.$noticia->getId()) ?>"><?php echo $noticia->getTitulo() ?></a></td>
      <td><?php echo $noticia->getTexto() ?></td>
      <td><?php echo $noticia->getFechaPublicacion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('noticias/new') ?>">Nueva Noticia</a>
