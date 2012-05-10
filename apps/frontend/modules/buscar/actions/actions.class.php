<?php

/**
 * buscar actions.
 *
 * @package    fonacot
 * @subpackage buscar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class buscarActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->query = $request->getParameter('query');
    
    $this->ajax = $request->isXmlHttpRequest();
    
    $this->pager = new sfPropelPager('General',sfConfig::get('app_max_buscar'));
    $this->pager->setCriteria(GeneralPeer::getLuceneQueryCriteria($this->query));
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init();
    if($this->pager->getNbResults() > 0) AutocompleterPeer::addSuggest($this->query);    
  }

  public function executeMicrositio(sfWebRequest $request)
  {
    $this->query = $request->getParameter('query');
    
    $this->pager = new sfPropelPager('Micrositio',sfConfig::get('app_max_buscar'));
    $this->pager->setCriteria(MicrositioPeer::getLuceneQueryCriteria($this->query));
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init(); 
    if($this->pager->getNbResults() > 0) AutocompleterPeer::addSuggest($this->query);
  }
  
public function executeProducto(sfWebRequest $request)
  {
    $this->query = $request->getParameter('query');
    
    $this->pager = new sfPropelPager('Producto',sfConfig::get('app_max_buscar'));
    $this->pager->setCriteria(ProductoPeer::getLuceneQueryCriteria($this->query));
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init(); 
    if($this->pager->getNbResults() > 0) AutocompleterPeer::addSuggest($this->query);   
  }
  
public function executeNoticia(sfWebRequest $request)
  {
    $this->query = $request->getParameter('query');
    
    $this->pager = new sfPropelPager('Noticia',sfConfig::get('app_max_buscar'));
    $this->pager->setCriteria(NoticiaPeer::getLuceneQueryCriteria($this->query));
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init(); 
    if($this->pager->getNbResults() > 0) AutocompleterPeer::addSuggest($this->query);   
  }
  
public function executeAnuncio(sfWebRequest $request)
  {
    $this->query = $request->getParameter('query');
    
    $this->pager = new sfPropelPager('Banner',sfConfig::get('app_max_buscar'));
    $this->pager->setCriteria(BannerPeer::getLuceneQueryCriteria($this->query));
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init(); 
    if($this->pager->getNbResults() > 0) AutocompleterPeer::addSuggest($this->query);  
  }
  
public function executeUbicacion(sfWebRequest $request)
  {
    $this->query = $request->getParameter('query');
    
    $this->pagerUbicacion = new sfPropelPager('Ubicacion',sfConfig::get('app_max_buscar'));
    $this->pagerUbicacion->setCriteria(UbicacionPeer::getLuceneQueryCriteria($this->query));
    $this->pagerUbicacion->setPage($request->getParameter('page',1));
    $this->pagerUbicacion->init(); 
    if($this->pagerUbicacion->getNbResults() > 0) AutocompleterPeer::addSuggest($this->query);  
  }
}
