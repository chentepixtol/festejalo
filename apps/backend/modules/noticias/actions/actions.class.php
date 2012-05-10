<?php

/**
 * noticias actions.
 *
 * @package    fonacot
 * @subpackage noticias
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class noticiasActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forwardUnless($empresa_id, 'empresa', 'new');
    $c = new Criteria();
    $c->add(NoticiaPeer::EMPRESA_ID,$this->getUser()->getAttribute('empresa_id'));
    $this->noticia_list = NoticiaPeer::doSelect($c);
  }

  public function executeNew(sfWebRequest $request)
  {
    $noticia = new Noticia();
    $noticia->setEmpresaId($this->getUser()->getAttribute('empresa_id'));
    $this->form = new NoticiaForm($noticia);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $noticia = new Noticia();
    $noticia->setEmpresaId($this->getUser()->getAttribute('empresa_id'));
    $this->form = new NoticiaForm($noticia);

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($noticia = NoticiaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object noticia does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($noticia->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No permitido");
    $this->form = new NoticiaForm($noticia);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($noticia = NoticiaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object noticia does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($noticia->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No permitido");
    $this->form = new NoticiaForm($noticia);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($noticia = NoticiaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object noticia does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($noticia->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'),"No permitido");
    $noticia->delete();

    $this->redirect('noticias/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $noticia = $form->save();

      $this->redirect('noticias/index');
    }
  }
}
