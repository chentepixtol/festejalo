<?php

/**
 * general actions.
 *
 * @package    fonacot
 * @subpackage general
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class generalActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  { 
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forwardUnless($empresa_id, 'empresa', 'new');
    $this->general = GeneralPeer::retrieveByPK($this->getUser()->getAttribute('empresa_id'));
    if(!$this->general)
    {
      $this->forward('general','new');
    }
  }

  public function executeNew(sfWebRequest $request)
  {
    $info_general = new General();
    $info_general->setEmpresaId($this->getUser()->getAttribute('empresa_id'));

    $this->form = new GeneralForm($info_general);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $info_general = new General();
    $info_general->setEmpresaId($this->getUser()->getAttribute('empresa_id'));

    $this->form = new GeneralForm($info_general);

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($general = GeneralPeer::retrieveByPk($request->getParameter('empresa_id')), sprintf('Object general does not exist (%s).', $request->getParameter('empresa_id')));
    $this->forward404Unless($general->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No Permitido");
    $this->form = new GeneralForm($general);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($general = GeneralPeer::retrieveByPk($request->getParameter('empresa_id')), sprintf('Object general does not exist (%s).', $request->getParameter('empresa_id')));
    $this->forward404Unless($general->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No Permitido");
    
    $this->form = new GeneralForm($general);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $general = $form->save();

      $this->redirect('general/index');
    }
  }
}
