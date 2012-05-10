<?php

/**
 * imprimir actions.
 *
 * @package    fonacot
 * @subpackage imprimir
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class imprimirActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }
  
  public function executeCupon(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->add(VisitanteCuponPeer::CUPON_ID, $request->getParameter('cupon') );
    $c->add(VisitanteCuponPeer::VISITANTE_ID, $this->getUser()->getAttribute('visitante_id'));
    $this->vis_cupones = VisitanteCuponPeer::doSelectJoinCupon($c);
  }
}
