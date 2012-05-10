<?php

/**
 * empresa actions.
 *
 * @package    fonacot
 * @subpackage empresa
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class empresaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->add(EmpresaPeer::USER_ID,$this->getUser()->getAttribute('usuario_id'));
    $this->empresa_list = EmpresaPeer::doSelect($c);
    
    $this->num_emp = $this->numeroEmpresas();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forwardUnless($this->numeroEmpresas()==0,'empresa','index');
    $this->form = new EmpresaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $empresa = new Empresa();
    $empresa->setUserId($this->getUser()->getAttribute('usuario_id')); 

    $this->form = new EmpresaForm($empresa);

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($empresa = EmpresaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object empresa does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($empresa->getUserId()==$this->getUser()->getAttribute('usuario_id'),"Esta empresa no le pertenece");
    $this->form = new EmpresaForm($empresa);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($empresa = EmpresaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object empresa does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($empresa->getUserId()==$this->getUser()->getAttribute('usuario_id'),"Esta empresa no le pertenece");
    $this->form = new EmpresaForm($empresa);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($empresa = EmpresaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object empresa does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($empresa->getUserId()==$this->getUser()->getAttribute('usuario_id'),"Esta empresa no le pertenece");

    $empresa->delete();
    
    $this->getUser()->setAttribute('empresa_id', 0);

    $this->redirect('empresa/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $empresa = $form->save();
      $this->getUser()->setAttribute('empresa_id',$empresa->getId());

      $this->redirect('empresa/edit?id='.$empresa->getId());
    }
  }
  
  private function numeroEmpresas()
  {
    $c = new Criteria();
    $c->add(EmpresaPeer::USER_ID,$this->getUser()->getAttribute('usuario_id'));
    
    return EmpresaPeer::doCount($c);
  }
}
