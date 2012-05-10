<?php

/**
 * tramite actions.
 *
 * @package    fonacot
 * @subpackage tramite
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class tramiteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forwardUnless($empresa_id, 'empresa', 'new');
    $this->tramite = TramitePeer::retrieveByPK($this->getUser()->getAttribute('empresa_id'));
    $this->forwardIf(!$this->tramite,'tramite','new');
  }

  public function executeNew(sfWebRequest $request)
  {
    $tramite = new Tramite();
    $tramite->setEmpresaId($this->getUser()->getAttribute('empresa_id'));
    $this->form = new TramiteForm($tramite);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $tramite = new Tramite();
    $tramite->setEmpresaId($this->getUser()->getAttribute('empresa_id'));
    $this->form = new TramiteForm($tramite);

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tramite = TramitePeer::retrieveByPk($request->getParameter('empresa_id')), sprintf('Object tramite does not exist (%s).', $request->getParameter('empresa_id')));
    $this->forward404Unless($tramite->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'));
    $this->form = new TramiteForm($tramite);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($tramite = TramitePeer::retrieveByPk($request->getParameter('empresa_id')), sprintf('Object tramite does not exist (%s).', $request->getParameter('empresa_id')));
    $this->forward404Unless($tramite->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'));
    $this->form = new TramiteForm($tramite);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tramite = $form->save();

      $this->redirect('tramite/edit?empresa_id='.$tramite->getEmpresaId());
    }
  }
}
