<ul>
<?php foreach($ubicaciones as $ubicacion):?>
   <?php include_partial('empresas/empresa_list', array(
     'empresa' => $ubicacion->getEmpresa()
   ))?>
<?php endforeach;?>
</ul>