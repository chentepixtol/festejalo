
<ul>
<?php foreach($pager->getResults() as $noticia):?>
  <?php include_partial('noticias/noticia_list', array('noticia' => $noticia))?>
<?php endforeach;?>
</ul>

<?php include_partial('global/pager_lucene', array(
  'pager' => $pager,
  'url' => 'buscar/noticia',
  'query' => $query,
  'description' => 'resultados encontrados en noticias',
))?>