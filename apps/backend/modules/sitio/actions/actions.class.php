<?php

/**
 * sitio actions.
 *
 * @package    fonacot
 * @subpackage sitio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class sitioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forwardUnless($empresa_id, 'empresa', 'new');
    $this->micrositio = MicrositioPeer::retrieveByPK($this->getUser()->getAttribute('empresa_id'));
    $this->forwardIf(!$this->micrositio,'sitio','new');
  }

  public function executeNew(sfWebRequest $request)
  {
    $sitio = new Micrositio();
    $sitio->setEmpresaId($this->getUser()->getAttribute('empresa_id'));
    $this->form = new MicrositioForm($sitio);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $sitio = new Micrositio();
    $sitio->setEmpresaId($this->getUser()->getAttribute('empresa_id'));

    $this->form = new MicrositioForm($sitio);

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($micrositio = MicrositioPeer::retrieveByPk($request->getParameter('empresa_id')), sprintf('Object micrositio does not exist (%s).', $request->getParameter('empresa_id')));
    $this->forward404Unless($micrositio->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No permitido");
    $this->form = new MicrositioForm($micrositio);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($micrositio = MicrositioPeer::retrieveByPk($request->getParameter('empresa_id')), sprintf('Object micrositio does not exist (%s).', $request->getParameter('empresa_id')));
    $this->forward404Unless($micrositio->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No permitido");
    $this->form = new MicrositioForm($micrositio);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

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

      $this->redirect('sitio/index');
    }
  }
}
