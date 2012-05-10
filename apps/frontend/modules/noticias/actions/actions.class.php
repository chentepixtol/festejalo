<?php

/**
 * noticias actions.
 *
 * @package    fonacot
 * @subpackage noticias
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class noticiasActions extends sfActions
{
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('noticias', 'listado');
  }
  
  public function executeListado(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->addDescendingOrderByColumn(NoticiaPeer::FECHA_PUBLICACION);

    $this->pager = new sfPropelPager('Noticia',sfConfig::get('app_max_noticia'));
    $this->pager->setCriteria($c);
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init();
  }
}
