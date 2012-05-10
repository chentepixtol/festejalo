<?php

require_once dirname(__FILE__).'/../lib/adminproductoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adminproductoGeneratorHelper.class.php';

/**
 * adminproducto actions.
 *
 * @package    fonacot
 * @subpackage adminproducto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class adminproductoActions extends autoAdminproductoActions
{
  public function executeView(sfWebRequest $request)
  {
    $this->producto = ProductoPeer::retrieveByPK($request->getParameter('id'));
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    
    $foto = $form->getValue('foto');
    
    if ($form->isValid() && !empty($foto))
    {
      $producto = $form->save();
      $nombre_archivo = "producto_" . $producto->getEmpresaId() . "_" . sha1($foto->getOriginalName()) . $foto->getOriginalExtension();
      $foto->save(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo );

      $foto_opt = new Thumbnail(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo);
      $foto_opt->resize(560,420);
      $foto_opt->save(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo, sfConfig::get('app_imagen_calidad'));

      $producto->setFoto( $nombre_archivo );
      $producto->setMiniatura( 'mini_' . $nombre_archivo);

      $producto->save();

      $miniatura = new Thumbnail(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo);
      $miniatura->resize(150,150);
      $miniatura->save(sfConfig::get('sf_upload_dir'). '/mini/' . 'mini_' . $nombre_archivo, sfConfig::get('app_imagen_calidad'));

    }
    parent::processForm($request, $form);
  }

}
