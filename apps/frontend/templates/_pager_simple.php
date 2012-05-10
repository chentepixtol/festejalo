<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for($url. '?page=1') ?>" class="ajax">
      <img src="/images/first.png" alt="Primer página" />
    </a>
 
    <a href="<?php echo url_for($url. '?page=' . $pager->getPreviousPage()) ?>" class="ajax">
      <img src="/images/previous.png" alt="Página anterior" title="Página anterior" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for($url. '?page=' . $page) ?>" class="ajax"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for($url. '?page='. $pager->getNextPage()) ?>" class="ajax">
      <img src="/images/next.png" alt="Página siguiente" title="Página siguiente" />
    </a>
 
    <a href="<?php echo url_for($url . '?page=' . $pager->getLastPage()) ?>" class="ajax">
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