<?php

/**
 * noticia actions.
 *
 * @package    fonacot
 * @subpackage noticia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class noticiaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }
  
  public function executeEmpresa(sfWebRequest $request)
  {
    $this->empresa = $this->getRoute()->getObject();
    $c = new Criteria();
    $c->add(NoticiaPeer::EMPRESA_ID, $this->empresa->getId());
    $this->list_noticias = NoticiaPeer::doSelect($c);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->noticia = $this->getRoute()->getObject();
    $this->empresa = $this->noticia->getEmpresa();
  }
}
