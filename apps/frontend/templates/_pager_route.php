<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for($route, $model_object) ?>?page=1">
      <img src="/images/first.png" alt="Primer página" />
    </a>
 
    <a href="<?php echo url_for($route, $model_object) ?>?page=<?php echo $pager->getPreviousPage() ?>">
      <img src="/images/previous.png" alt="Página anterior" title="Página anterior" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for($route, $model_object) ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for($route, $model_object) ?>?page=<?php echo $pager->getNextPage() ?>">
      <img src="/images/next.png" alt="Página siguiente" title="Página siguiente" />
    </a>
 
    <a href="<?php echo url_for($route, $model_object) ?>?page=<?php echo $pager->getLastPage() ?>">
      <img src="/images/last.png" alt="Ultima página" title="Ultima página" />
    </a>
  </div>
<?php endif; ?>
 
<div class="pagination_desc">
  <strong><?php echo $pager->getNbResults() ?></strong> <?php echo $description ?>
 
  <?php if ($pager->haveToPaginate()): ?>
    - página <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>

<br />