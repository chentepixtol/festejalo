<?php slot('pagetitle',"Noticias")?>
<ul>
    <?php foreach ($pager->getResults() as $noticia): ?>
      <?php include_partial('noticia_list', array('noticia' => $noticia))?>
    <?php endforeach; ?>
</ul>
    <?php include_partial('global/pager_simple',array(
      'pager' => $pager,
      'url' => 'noticias/listado',
      'description'=> 'noticias indexadas',
    ))?>