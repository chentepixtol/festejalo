<?php

/**
 * anuncio actions.
 *
 * @package    fonacot
 * @subpackage anuncio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class anuncioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forwardUnless($empresa_id, 'empresa', 'new');
    $c = new Criteria();
    $c->add(BannerPeer::EMPRESA_ID, $empresa_id);
    $this->banner_list = BannerPeer::doSelect($c);
  }

  public function executeNew(sfWebRequest $request)
  {
    $banner = new Banner();
    $banner->setEmpresaId($this->getUser()->getAttribute('empresa_id'));
    $this->form = new BannerForm($banner);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $banner = new Banner();
    $banner->setEmpresaId($this->getUser()->getAttribute('empresa_id'));
    $this->form = new BannerForm($banner);
    
    

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($banner = BannerPeer::retrieveByPk($request->getParameter('id')), sprintf('Object banner does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($banner->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No Permitido");
    $this->form = new BannerForm($banner);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($banner = BannerPeer::retrieveByPk($request->getParameter('id')), sprintf('Object banner does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($banner->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No Permitido");
    $this->form = new BannerForm($banner);
    
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($banner = BannerPeer::retrieveByPk($request->getParameter('id')), sprintf('Object banner does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($banner->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No Permitido");

    $banner->delete();

    $this->redirect('anuncio/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $banner = $form->save();

      $imagen = $form->getValue('imagen');

      if(!empty($imagen))
      {
        $nombre_archivo = "banner_" . $banner->getEmpresaId() . "_" . sha1($imagen->getOriginalName()) . $imagen->getOriginalExtension();
        $imagen->save(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo );

        $foto_opt = new Thumbnail(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo);
        $foto_opt->resize(sfConfig::get('app_banner_width'),sfConfig::get('app_banner_height'));
        $foto_opt->save(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo, sfConfig::get('app_imagen_calidad'));
         
        $banner->setImagen( $nombre_archivo );

        $banner->save();
      }
      $this->redirect('anuncio/index');
    }
  }
}
