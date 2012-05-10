<?php if(!$ajax):?>
  <?php slot('pagetitle',"Buscador")?>
  <?php include_partial('menu',array('query' => $query))?>
<?php endif;?>
<?php slot('script')?>
  <script type="text/javascript" src="/js/modules/buscar.js"></script>
<?php end_slot()?>
<div id="buscador_container">

<ul>
  <?php foreach($pager->getResults() as $general):?>
     <?php include_partial('empresas/empresa_list', array('empresa' => $general->getEmpresa()))?>
  <?php endforeach;?>
</ul>

<?php include_partial('global/pager_lucene', array(
  'pager' => $pager,
  'url' => 'buscar/micrositio',
  'query' => $query,
  'description' => 'resultados encontrados.',
))?>

</div>