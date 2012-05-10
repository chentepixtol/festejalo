<h1>Información del Tramite</h1>

<table>
  <thead>
    <tr>
      <th>Empresa</th>
      <th>Recepcion del credito</th>
      <th>Recepcion del tramite</th>
      <th>Persona encargada</th>
      <th>Horario</th>
      <th>Precedimiento</th>
      <th>Documentacion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="<?php echo url_for('tramite/edit?empresa_id='.$tramite->getEmpresaId()) ?>">Editar</a></td>
      <td><?php echo $tramite->getRecepcionDelCredito() ?></td>
      <td><?php echo $tramite->getRecepcionDelTramite() ?></td>
      <td><?php echo $tramite->getPersonaEncargada() ?></td>
      <td><?php echo $tramite->getHorario() ?></td>
      <td><?php echo $tramite->getProcedimiento() ?></td>
      <td><?php echo $tramite->getDocumentacion() ?></td>
    </tr>
  </tbody>
</table>

