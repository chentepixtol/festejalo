<?php

/**
 * registro actions.
 *
 * @package    fonacot
 * @subpackage registro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class registroActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }
  
  public function executeDatos(sfWebRequest $request)
  {
    $this->form = new sfGuardUserForm();
  }
  
  public function executeVerifica(sfWebRequest $request)
  {
    $this->form = new sfGuardUserForm();
    $captcha = array(
     'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
     'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
    );
    $full_form = array_merge($request->getParameter('sf_guard_user'), array('captcha' => $captcha));
    
    //$this->form->bind($request->getParameter('sf_guard_user'));
    
    $this->form->bind($full_form);
    
    if($this->form->isValid())
    {
      $usuario = $this->form->save();
      $usuario->addPermissionByName('Basico');
      $usuario->save();
      $this->redirect('registro/bienvenido');
    }
    else
    {
      $this->setTemplate('datos');
    }
  }
  public function executeBienvenido(sfWebRequest $request)
  {
    
  }
}
