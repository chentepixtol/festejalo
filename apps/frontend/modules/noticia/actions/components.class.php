<?php
class noticiaComponents extends sfComponents
{
  public function executeUltimasNoticias()
  {
    $c = new Criteria();
    $c->addDescendingOrderByColumn(NoticiaPeer::FECHA_PUBLICACION);
    $c->setLimit(sfConfig::get('app_max_ultimas_noticias'));
    $this->noticias = NoticiaPeer::doSelect($c); 
  }
}