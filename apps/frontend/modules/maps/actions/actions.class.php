<?php

/**
 * maps actions.
 *
 * @package    fonacot
 * @subpackage maps
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class mapsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $c = new Criteria();
    $this->pager = new sfPropelPager('Ubicacion',sfConfig::get('app_max_maps'));
    $this->pager->setCriteria($c);
    $this->pager->setPage($request->getParameter('page',1));
    $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->empresa = $this->getRoute()->getObject();
    $this->ubicacion = $this->empresa->getUbicacion();
    if(!$request->isXmlHttpRequest())
    {
      $this->setLayout('multiflex1c');
    }
  }
  
  public function executeEmpresasByPosition(sfWebRequest $request)
  {
    $LatInf = $request->getParameter('lati');
    $LatSup = $request->getParameter('lats');
    $LngInf = $request->getParameter('lngi');
    $LngSup = $request->getParameter('lngs');
    
    $c = new Criteria();
    $criterion = $c->getNewCriterion(UbicacionPeer::LATITUD, $LatInf, Criteria::GREATER_EQUAL);
    $criterion->addAnd($c->getNewCriterion(UbicacionPeer::LATITUD, $LatSup, Criteria::LESS_EQUAL));
    $c->add($criterion);
    
    $criterion2 = $c->getNewCriterion(UbicacionPeer::LONGITUD, $LngInf, Criteria::GREATER_EQUAL);
    $criterion2->addAnd($c->getNewCriterion(UbicacionPeer::LONGITUD, $LngSup, Criteria::LESS_EQUAL));    
    $c->add($criterion2);
    
    $this->ubicaciones = UbicacionPeer::doSelectJoinAll($c);
  }

}
