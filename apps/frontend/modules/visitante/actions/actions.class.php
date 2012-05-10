<?php

/**
 * visitante actions.
 *
 * @package    fonacot
 * @subpackage visitante
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class visitanteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->nombre = $this->getUser()->getAttribute('nombre');
  }

  public function executeRegistro(sfWebRequest $request)
  {
    $this->form = new VisitanteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new VisitanteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('registro');
  }

  public function executeLogin(sfWebRequest $request)
  {
    $this->form = new VisitanteSessionForm();
  }

  public function executeVerifica(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new VisitanteSessionForm();
    $this->form->bind($request->getParameter('visitante'));
    $usename = $this->form->getValue('username');
    $password = md5($this->form->getValue('password'));
    if($this->form->isValid())
    {
      $c = new Criteria();
      $c->add(VisitantePeer::USERNAME,$usename);
      $visitante = VisitantePeer::doSelectOne($c);
      if(!empty($visitante))
      {
        if($visitante->getPassword() == $password)
        {
          $this->getUser()->setAttribute('nombre',$visitante->getNombre());
          $this->getUser()->setAttribute('visitante_id',$visitante->getId());
          $this->getUser()->setAuthenticated(true);
          $this->getUser()->addCredential('Visitante');
          $this->redirect('visitante/index');
        }
      }
      $this->getUser()->setFlash('notice',"El Usuario y/o el Password son Incorrectos ");
      $this->redirect('visitante/login');
    }
    else
    {
      $this->setTemplate('login');
    }
  }
  
  public function executeSalir(sfWebRequest $request)
  {
    $_SESSION = array();
    session_destroy();
    $this->redirect('@homepage');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $captcha = array(
     'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
     'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
    );
    $full_form = array_merge($request->getParameter($form->getName()), array('captcha' => $captcha));

    //$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $form->bind($full_form, $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $visitante = $form->save();

      $this->redirect('visitante/login');
    }
  }

  public function executeCupones(sfWebRequest $request)
  {
    $cupon_id=$request->getParameter('cupon');
    if(!empty($cupon_id))
    {
      $cupon = CuponPeer::retrieveByPK($cupon_id);
      if( !is_null($cupon))
      {
        if($cupon->getNumero() == 0)
        {
          $this->getUser()->setFlash('notice',"Ya no se encuentra Disponible");
        }
        else
        {
          $cupon->setNumero($cupon->getNumero() - 1);
          $visitante_cupon = new VisitanteCupon();
          $visitante_cupon->setVisitanteId($this->getUser()->getAttribute('visitante_id'));
          $visitante_cupon->setCupon($cupon);
          $visitante_cupon->setCodigo(md5($cupon_id . time() . $this->getUser()->getAttribute('visitante_id') ));
          try
          {
            $visitante_cupon->save();
          }
          catch (Exception $e)
          {
            throw $e;
          }
        }
      }
    }
    $this->forward('visitante','index');

  }

}
