<?php

/**
 * productos actions.
 *
 * @package    fonacot
 * @subpackage productos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class productosActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('productos', 'listado');
  }
  
  public function executeListado(sfWebRequest $request)
  {
    $c = new Criteria();
    $this->pager = new sfPropelPager('Producto',sfConfig::get('app_max_producto'));
    $this->pager->setCriteria($c);
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init();
  }
}
