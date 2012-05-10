<?php

/**
 * promociones actions.
 *
 * @package    fonacot
 * @subpackage promociones
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class promocionesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forwardUnless($empresa_id, 'empresa', 'new');
    $c = new Criteria();
    $c->add(CuponPeer::EMPRESA_ID, $this->getUser()->getAttribute('empresa_id'));
    $this->cupon_list = CuponPeer::doSelect($c);
  }

  public function executeNew(sfWebRequest $request)
  {
    $cupon = new Cupon();
    $cupon->setEmpresaId($this->getUser()->getAttribute('empresa_id'));
    $this->form = new CuponForm($cupon);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $cupon = new Cupon();
    $cupon->setEmpresaId($this->getUser()->getAttribute('empresa_id'));
    
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new CuponForm($cupon);

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($cupon = CuponPeer::retrieveByPk($request->getParameter('id')), sprintf('Object cupon does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($cupon->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'));
    $this->form = new CuponForm($cupon);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($cupon = CuponPeer::retrieveByPk($request->getParameter('id')), sprintf('Object cupon does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($cupon->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'));
    
    $this->form = new CuponForm($cupon);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($cupon = CuponPeer::retrieveByPk($request->getParameter('id')), sprintf('Object cupon does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($cupon->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'));
    
    $cupon->delete();

    $this->redirect('promociones/index');
  }
  
  public function executeCodigo(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->add(CuponPeer::EMPRESA_ID, $this->getUser()->getAttribute('empresa_id'));
    $this->vis_cupones = VisitanteCuponPeer::doSelectJoinAll($c);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $cupon = $form->save();

      $this->redirect('promociones/index');
    }
  }
}
