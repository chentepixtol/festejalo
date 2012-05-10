<?php

/**
 * empresa actions.
 *
 * @package    fonacot
 * @subpackage empresa
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class empresaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }

  public function executeShow(sfWebRequest $request)
  {
   
    $this->empresa = $this->getRoute()->getObject();
    $this->info_general = $this->empresa->getGeneral();
    $this->ubicacion = $this->empresa->getUbicacion();
    $this->micrositio = $this->empresa->getMicrositio();
    $this->promociones = $this->empresa->getCupons();
    if($request->hasParameter('imprimir')){
      $this->setLayout('multiflex1c');
    }
    
  }
  
  public function executeTramite(sfWebRequest $request)
  {
    $this->empresa = $this->getRoute()->getObject();
    $this->info_tramite = $this->empresa->getTramite();
  }
  

}