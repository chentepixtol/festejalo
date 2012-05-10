<ol>
  <?php foreach($categorias as $categoria):?>
    <li>
    <a href="<?php echo url_for('ver_empresas_por_categoria', $categoria)?>" class="AniLink">
      <?php echo $categoria->getNombre()?>
    </a>
    </li>
  <?php endforeach;?>
</ol>    

<?php include_partial('global/ajax_request', array(
  'pagetitle' => "Categorias",
))?>