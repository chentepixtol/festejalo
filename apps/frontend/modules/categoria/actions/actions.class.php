<?php

/**
 * categoria actions.
 *
 * @package    fonacot
 * @subpackage categoria
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class categoriaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('categorias','listado');
  }
  
  public function executeEmpresas(sfWebRequest $request)
  {
    $this->categoria = $this->getRoute()->getObject();
   
    $c = new Criteria();
    $c->add(EmpresaCategoriaPeer::CATEGORIA_ID,$this->categoria->getId());
    
    $this->pager = new sfPropelPager('EmpresaCategoria', sfConfig::get('app_max_categoria'));
    $this->pager->setCriteria($c);
    $this->pager->setPeerMethod('doSelectJoinEmpresa');
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init();
  }
  
  public function executeFiltrar(sfWebRequest $request)
  {
    $this->categorias = $request->getParameter('categoria');
    
    $c = new Criteria();
    $c->add(EmpresaCategoriaPeer::CATEGORIA_ID,  $this->categorias  , Criteria::IN);
    
    $this->pager = new sfPropelPager('EmpresaCategoria', sfConfig::get('app_max_categoria'));
    $this->pager->setCriteria($c);
    $this->pager->setPeerMethod('doSelectJoinEmpresa');
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init();
    
  }
  
}
