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
    
  }

  public function executeInicio(sfWebRequest $request)
  {
    if( !$this->getUser()->getAttribute("usuario_id") )
    {
      $usuario = $this->getUser()->getGuardUser();
      $usuario_profile = $usuario->getProfile();
      $this->getUser()->setAttribute("usuario_id",$usuario->getId());
      $this->getUser()->setAttribute('username',$usuario->getUsername());
      $this->getUser()->setAttribute("nombre",$usuario_profile->getNombre());
      $c = new Criteria();
      $c->add(EmpresaPeer::USER_ID,$usuario->getId());
      if($empresa = EmpresaPeer::doSelectOne($c))
      {
        $this->getUser()->setAttribute('empresa_id',$empresa->getId());
      }
      else
      {
        $this->getUser()->setAttribute('empresa_id',0);
      }
    }
    $this->redirect('@homepage');
  }
  
  public function executeSalir()
  {
    $_SESSION = array();
    session_destroy();
    $this->redirect('@homepage');
  }
  
  public function executeMembresia(sfWebRequest $request)
  {
    
  }
  
  public function executeIntermedio(sfWebRequest $request)
  { 
  }
  
  public function executeAvanzado(sfWebRequest $request)
  { 
  }
}
