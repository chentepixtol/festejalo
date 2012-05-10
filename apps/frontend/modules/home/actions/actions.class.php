<?php

/**
 * home actions.
 *
 * @package    fonacot
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form_filter = new CategoriaFilter();

  }
  
  public function executeAutocomplete(sfWebRequest $request)
  {
    $query = $request->getParameter('query');
    $words = AutocompleterPeer::getSuggests($query); 
    $this->renderText(json_encode($words));
    return sfView::NONE;
  }
  
  public function executeJson()
  {
    $A = array( 
      'coord_df' => array('x' => 19.611704, 'y' => -99.249634),
      'coord_guadalajara' => array('x' => 19.611704, 'y' => -99.249634),
      'coord_monterrey' => array('x' => 19.611704, 'y' => -99.249634 )
    );
    $this->getResponse()->setContentType('application/json');
    $this->renderText(json_encode($A));
    return sfView::NONE;
  }

}
