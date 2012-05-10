<?php

/**
 * segmento actions.
 *
 * @package    festejalo
 * @subpackage segmento
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class segmentoActions extends sfActions
{
  
  public function executeEmpresas(sfWebRequest $request)
  {
    $this->segmento = $this->getRoute()->getObject();
   
    $c = new Criteria();
    $c->add(EmpresaSegmentoPeer::SEGMENTO_ID, $this->segmento->getId());
    
    $this->pager = new sfPropelPager('EmpresaSegmento', sfConfig::get('app_max_segmento'));
    $this->pager->setCriteria($c);
    $this->pager->setPeerMethod('doSelectJoinEmpresa');
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init();
  }

}
