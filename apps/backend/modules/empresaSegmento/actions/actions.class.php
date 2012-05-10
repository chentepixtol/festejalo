<?php

/**
 * empresaSegmento actions.
 *
 * @package    festejalo
 * @subpackage empresaSegmento
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class empresaSegmentoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forwardUnless($empresa_id, 'empresa', 'new');
    $c = new Criteria();
    $c->add(EmpresaSegmentoPeer::EMPRESA_ID, $empresa_id);
    $this->empresa_segmento_list = EmpresaSegmentoPeer::doSelect($c);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forwardUnless($this->getUser()->getAttribute('empresa_id') != 0, 'empresa', 'index');
    $this->form = new EmpresaSegmentoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forwardUnless($empresa_id != 0, 'empresa', 'index');
    
    $this->forward404Unless($request->isMethod('post'));
    
    $empresa_segmento = new EmpresaSegmento();
    $empresa_segmento->setEmpresaId($empresa_id);

    $this->form = new EmpresaSegmentoForm($empresa_segmento);

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forwardUnless($empresa_id!=0, 'empresa', 'index');
    $this->forward404Unless($empresa_segmento = EmpresaSegmentoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object empresa_segmento does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($empresa_id == $empresa_segmento->getEmpresaId());
    
    $this->form = new EmpresaSegmentoForm($empresa_segmento);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forwardUnless($empresa_id != 0, 'empresa', 'index');
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($empresa_segmento = EmpresaSegmentoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object empresa_segmento does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($empresa_id == $empresa_segmento->getEmpresaId());
    $this->form = new EmpresaSegmentoForm($empresa_segmento);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forward404Unless($empresa_segmento = EmpresaSegmentoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object empresa_segmento does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($empresa_id == $empresa_segmento->getEmpresaId());
    $empresa_segmento->delete();

    $this->redirect('empresaSegmento/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $empresa_segmento = $form->save();

      $this->redirect('empresaSegmento/edit?id='.$empresa_segmento->getId());
    }
  }
}
