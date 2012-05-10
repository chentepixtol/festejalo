<?php

/**
 * anuncios actions.
 *
 * @package    fonacot
 * @subpackage anuncios
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class anunciosActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('anuncios', 'listado');
  }
  
  public function executeListado(sfWebRequest $request)
  {
    $c = new Criteria();
    $this->pager = new sfPropelPager('Banner', sfConfig::get('app_max_banner'));
    $this->pager->setCriteria($c);
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init();  
  }
  
}
