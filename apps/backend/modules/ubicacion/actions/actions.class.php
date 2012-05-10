<?php

/**
 * ubicacion actions.
 *
 * @package    fonacot
 * @subpackage ubicacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class ubicacionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forwardUnless($empresa_id,'empresa','new');
    $this->ubicacion = UbicacionPeer::retrieveByPK($empresa_id);
    $this->forwardIf(!$this->ubicacion,'ubicacion','new');
  }

  public function executeNew(sfWebRequest $request)
  {
    $ubicacion = new Ubicacion();
    $ubicacion->setEmpresaId($this->getUser()->getAttribute('empresa_id'));
    $this->form = new UbicacionForm($ubicacion);
    $this->setTemplate('edit');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $ubicacion = new Ubicacion();
    $ubicacion->setEmpresaId($this->getUser()->getAttribute('empresa_id'));
    
    $this->form = new UbicacionForm($ubicacion);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($ubicacion = UbicacionPeer::retrieveByPk($request->getParameter('empresa_id')), sprintf('Object ubicacion does not exist (%s).', $request->getParameter('empresa_id')));
    $this->forward404Unless($ubicacion->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No permitido");
    $this->form = new UbicacionForm($ubicacion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($ubicacion = UbicacionPeer::retrieveByPk($request->getParameter('empresa_id')), sprintf('Object ubicacion does not exist (%s).', $request->getParameter('empresa_id')));
    $this->forward404Unless($ubicacion->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No permitido");
    $this->form = new UbicacionForm($ubicacion);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  
  public function executeCoordenadas(sfWebRequest $request)
  {
    $this->forward404Unless($ubicacion = UbicacionPeer::retrieveByPk($request->getParameter('empresa_id')), sprintf('Object ubicacion does not exist (%s).', $request->getParameter('empresa_id')));
    $this->forward404Unless($ubicacion->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No permitido");
    $datos = array();
    $url_base = "http://maps.google.com/maps/geo?q=";
    $params = $ubicacion->getColonia() .", ". $ubicacion->getDelegacion().", ". $ubicacion->getCodigoPostal();
    $options = "&output=csv&key=" . sfConfig::get('app_maps_api_key');
    $content = file_get_contents( $url_base . urlencode( $params ). $options . "\"");
    list($server, $precision, $latitud, $longitud ) = explode(',',$content);
    $datos['latitud'] = $latitud;
    $datos['longitud'] = $longitud;
    $json = json_encode($datos);
    $this->getResponse()->setContentType('application/json');
    $this->renderText($json);
    return sfView::NONE;  
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ubicacion = $form->save();

      $this->redirect('ubicacion/edit?empresa_id='.$ubicacion->getEmpresaId());
    }
  }
}
