<h1>Perfil del Usuario</h1>

<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellido paterno</th>
      <th>Apellido materno</th>
      <th>Email</th>
      <th>Telefono</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="<?php echo url_for('perfil/edit?id='.$perfil->getId()) ?>"><?php echo $perfil->getNombre() ?></a></td>
      <td><?php echo $perfil->getApellidoPaterno() ?></td>
      <td><?php echo $perfil->getApellidoMaterno() ?></td>
      <td><?php echo $perfil->getEmail() ?></td>
      <td><?php echo $perfil->getTelefono() ?></td>
    </tr>
  </tbody>
</table>
