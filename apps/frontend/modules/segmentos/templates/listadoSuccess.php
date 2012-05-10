<ol>
  <?php foreach($segmentos as $segmento):?>
    <li>
    <a href="<?php echo url_for('ver_empresas_por_segmento', $segmento)?>" class="AniLink">
      <?php echo $segmento->getNombre()?>
    </a>
    </li>
  <?php endforeach;?>
</ol>    

<?php include_partial('global/ajax_request', array(
  'pagetitle' => "Segmentos",
))?>