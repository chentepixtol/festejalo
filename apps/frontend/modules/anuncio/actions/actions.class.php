<?php

/**
 * anuncio actions.
 *
 * @package    fonacot
 * @subpackage anuncio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class anuncioActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->banner = $this->getRoute()->getObject();
    $this->empresa = $this->banner->getEmpresa();
  }
  
  public function executeEmpresa(sfWebRequest $request)
  {
    $c = new Criteria();
    $this->empresa = $this->getRoute()->getObject();
    $c->add(BannerPeer::EMPRESA_ID,  $this->empresa->getId());
    $this->anuncios = BannerPeer::doSelect($c);
  }
  
}
