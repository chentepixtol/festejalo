<?php

require_once dirname(__FILE__).'/../lib/adminempresaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adminempresaGeneratorHelper.class.php';

/**
 * adminempresa actions.
 *
 * @package    fonacot
 * @subpackage adminempresa
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class adminempresaActions extends autoAdminempresaActions
{
  public function executeVerProductos(sfWebRequest $request)
  {
    $request->addRequestParameters(array(
      'producto_filters'=> array(
        'empresa_id' => $request->getParameter('id')
      )
    ));
    $this->forward('adminproducto','filter');
  }
  
  public function executeVerNoticias(sfWebRequest $request)
  {
    $request->addRequestParameters(array(
      'noticia_filters' => array(
        'empresa_id' => $request->getParameter('id')
      )
    ));
    $this->forward('adminnoticia','filter');
    
  }
  
  public function executeVerAnuncios(sfWebRequest $request)
  {
    $request->addRequestParameters(array(
      'banner_filters' => array(
         'empresa_id' => $request->getParameter('id')
      )
    ));
    $this->forward('adminanuncio','filter');
  }
  
  public function executeEditUbicacion(sfWebRequest $request)
  {
    $ubicacion = UbicacionPeer::retrieveOrCreate($request->getParameter('id'));
    $this->redirect($this->generateUrl('ubicacion_edit',$ubicacion));
  }
  
  public function executeEditMicrositio(sfWebRequest $request)
  {
    $micrositio = MicrositioPeer::retrieveOrCreate($request->getParameter('id'));
    $this->redirect($this->generateUrl('micrositio_edit',$micrositio));
  }
    
  public function executeEditGeneral(sfWebRequest $request)
  {
    $general = GeneralPeer::retrieveOrCreate($request->getParameter('id'));
    $this->redirect($this->generateUrl('general_edit',$general));
  }
  
  public function executeCambiarBasico(sfWebRequest $request)
  {
    $this->cambiarPermiso('Basico', $request->getParameter('id'));
    $this->redirect('adminempresa/index');
  }
  
  public function executeCambiarIntermedio(sfWebRequest $request)
  {
    $this->cambiarPermiso('Intermedio', $request->getParameter('id'));
    $this->redirect('adminempresa/index');
  }
  
  public function executeCambiarAvanzado(sfWebRequest $request)
  {
    $this->cambiarPermiso('Avanzado', $request->getParameter('id'));
    $this->redirect('adminempresa/index');
  }
  
  private function cambiarPermiso($permiso_string, $empresa_id)
  {
    $empresa = EmpresaPeer::retrieveByPK($empresa_id);
    $user_id = $empresa->getUserId();
    $usuario = sfGuardUserPeer::retrieveByPK($user_id);
    $permisos = $usuario->getsfGuardUserPermissions();
    foreach($permisos as $permiso)
    {
      $permiso->delete();
    }
    $usuario->addPermissionByName($permiso_string);
    $usuario->save();
  }
}
