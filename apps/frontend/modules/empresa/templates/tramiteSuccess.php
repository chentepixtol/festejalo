<?php slot('title', sfConfig::get('app_page_title'). " - " . $empresa->getNombre() . " - Tramites" )?>
<?php slot('pagetitle','Tramites')?>
<?php slot('description', 'Documentacion y tramites para obtener un credito de la empresa' . $empresa->getNombre())?>
<?php slot('breadcum')?>
  <a href="<?php echo url_for('@homepage') ?>">Inicio</a>  >> 
  <a href="<?php echo url_for('empresa/index')?>">Empresas</a> >>
  <a href="<?php echo url_for('show_empresa',$empresa)?>" /><?php echo $empresa->getNombre()?></a> >>
  Tramites
<?php end_slot()?>

<?php if(!empty($info_tramite)):?>
<p>
    <span class="subtitulo">Recepción del Credito: </span>
    <?php echo $info_tramite->getRecepcionDelCredito()?>
</p>
<p>    
    <span class="subtitulo">Recepción del Tramite: </span>
    <?php echo $info_tramite->getRecepcionDelTramite()?>
</p>
<p>
    <span class="subtitulo">Persona Encargada: </span>
    <?php echo $info_tramite->getPersonaEncargada()?>
</p>
<p>    
    <span class="subtitulo">Horario: </span>
    <?php echo $info_tramite->getHorario()?>
</p>
<p>
    <span class="subtitulo">Procedimiento: </span>
    <?php echo $info_tramite->getProcedimiento()?>
</p>
<p>
    <span class="subtitulo">Documentación: </span>
    <?php echo $info_tramite->getDocumentacion()?>
</p>    
<?php endif?>
