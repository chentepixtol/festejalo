<?php

/**
 * producto actions.
 *
 * @package    fonacot
 * @subpackage producto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class productoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }
  
  public function executeEmpresa(sfWebRequest $request)
  {
    $this->empresa = $this->getRoute()->getObject();
    $c = new Criteria();
    $c->add(ProductoPeer::EMPRESA_ID, $this->empresa->getId());
    $this->list_productos = ProductoPeer::doSelect($c);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->producto = $this->getRoute()->getObject();
    $this->empresa = $this->producto->getEmpresa();
  }

}