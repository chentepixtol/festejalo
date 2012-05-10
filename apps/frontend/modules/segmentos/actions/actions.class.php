<?php

/**
 * segmentos actions.
 *
 * @package    festejalo
 * @subpackage segmentos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class segmentosActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('segmentos','listado');
  }
  
  public function executeListado(sfWebRequest $request)
  {
    $c = new Criteria();
    $this->segmentos = SegmentoPeer::doSelect($c);
    
  }
}
