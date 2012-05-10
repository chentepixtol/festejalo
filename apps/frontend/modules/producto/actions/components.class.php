<?php

class productoComponents extends sfComponents
{
  public function executeUltimosProductos()
  {
    $c = new Criteria();
    $c->addDescendingOrderByColumn('RAND()');
    $c->setLimit(sfConfig::get('app_max_productos_destacados'));
    $this->productos = ProductoPeer::doSelect($c);
  }
}