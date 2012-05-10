<?php

require_once dirname(__FILE__).'/../lib/adminmicrositioGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adminmicrositioGeneratorHelper.class.php';

/**
 * adminmicrositio actions.
 *
 * @package    fonacot
 * @subpackage adminmicrositio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class adminmicrositioActions extends autoAdminmicrositioActions
{
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $micrositio = $form->save();
      $logo = $form->getValue('logo');
      if(!empty($logo))
      {
        $nombre_archivo = "logo_" . $micrositio->getEmpresaId() . "_" . sha1($logo->getOriginalName()) . $logo->getOriginalExtension();
        $logo->save(sfConfig::get('sf_upload_dir') . '/' . $nombre_archivo );

        $micrositio->setLogo( $nombre_archivo );
        $micrositio->setMiniLogo("mini_"  . $nombre_archivo);
        $micrositio->save();

        $mini = new Thumbnail(sfConfig::get('sf_upload_dir') . '/' . $nombre_archivo);
        $mini->resize(150, 150);
        $mini->save(sfConfig::get('sf_upload_dir'). '/mini/mini_'. $nombre_archivo, 90 );
      }
    }
    parent::processForm($request, $form);
  }
}
