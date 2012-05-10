<?php

/**
 * giro actions.
 *
 * @package    fonacot
 * @subpackage giro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class giroActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forwardUnless($empresa_id, 'empresa', 'new');
    $c = new Criteria();
    $c->add(EmpresaCategoriaPeer::EMPRESA_ID,$this->getUser()->getAttribute('empresa_id'));
    $this->empresa_categoria_list = EmpresaCategoriaPeer::doSelect($c);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forwardUnless($this->getUser()->getAttribute('empresa_id')!=0,'empresa','index');
    $this->form = new EmpresaCategoriaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forwardUnless($this->getUser()->getAttribute('empresa_id')!=0,'empresa','index');
    $this->forward404Unless($request->isMethod('post'));

    $rel = new EmpresaCategoria();
    $rel->setEmpresaId($this->getUser()->getAttribute('empresa_id'));
    $this->form = new EmpresaCategoriaForm($rel);

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forwardUnless($this->getUser()->getAttribute('empresa_id')!=0,'empresa','index');
    $this->forward404Unless($empresa_categoria = EmpresaCategoriaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object empresa_categoria does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($empresa_categoria->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No permitido");
    $this->form = new EmpresaCategoriaForm($empresa_categoria);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forwardUnless($this->getUser()->getAttribute('empresa_id')!=0,'empresa','index');
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($empresa_categoria = EmpresaCategoriaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object empresa_categoria does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($empresa_categoria->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No permitido");
   
    $this->form = new EmpresaCategoriaForm($empresa_categoria);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->forwardUnless($this->getUser()->getAttribute('empresa_id')!=0,'empresa','index');
    $request->checkCSRFProtection();

    $this->forward404Unless($empresa_categoria = EmpresaCategoriaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object empresa_categoria does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($empresa_categoria->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No permitido");
   
    $empresa_categoria->delete();

    $this->redirect('giro/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $empresa_categoria = $form->save();

      $this->redirect('giro/index');
    }
  }
}
