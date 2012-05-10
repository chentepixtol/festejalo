<?php

require_once dirname(__FILE__).'/../lib/adminanuncioGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adminanuncioGeneratorHelper.class.php';

/**
 * adminanuncio actions.
 *
 * @package    fonacot
 * @subpackage adminanuncio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class adminanuncioActions extends autoAdminanuncioActions
{
  public function executeView(sfWebRequest $request)
  {
    $this->anuncio = BannerPeer::retrieveByPK($request->getParameter('id'));
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $imagen = $form->getValue('imagen');

    if ($form->isValid() && !empty($imagen))
    {
      $banner = $form->save();

      $nombre_archivo = "banner_" . $banner->getEmpresaId() . "_" . sha1($imagen->getOriginalName()) . $imagen->getOriginalExtension();
      $imagen->save(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo );

      $foto_opt = new Thumbnail(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo);
      $foto_opt->resize(sfConfig::get('app_banner_width'),sfConfig::get('app_banner_height'));
      $foto_opt->save(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo, sfConfig::get('app_imagen_calidad'));
       
      $banner->setImagen( $nombre_archivo );

      $banner->save();

    }

    //parent::processForm($request, $form);
  }
}
