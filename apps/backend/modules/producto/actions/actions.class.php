<?php

/**
 * producto actions.
 *
 * @package    fonacot
 * @subpackage producto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class productoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $empresa_id = $this->getUser()->getAttribute('empresa_id');
    $this->forwardUnless($empresa_id, 'empresa', 'new');
    $c = new Criteria();
    $c->add(ProductoPeer::EMPRESA_ID, $this->getUser()->getAttribute('empresa_id'));
    $this->producto_list = ProductoPeer::doSelect($c);
  }

  public function executeNew(sfWebRequest $request)
  {
    $producto = new Producto();
    $producto->setEmpresaId($this->getUser()->getAttribute('empresa_id'));
    $this->form = new ProductoForm($producto);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->forwardIf(!$this->hasPermisoCreateProducto($this->getUser()->getAttribute('empresa_id')),'home','membresia');
    $producto = new Producto();
    $producto->setEmpresaId($this->getUser()->getAttribute('empresa_id'));

    $this->form = new ProductoForm($producto);

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($producto = ProductoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object producto does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($producto->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'));
    $this->form = new ProductoForm($producto);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($producto = ProductoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object producto does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($producto->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'));
    $this->form = new ProductoForm($producto);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($producto = ProductoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object producto does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($producto->getEmpresaId()==$this->getUser()->getAttribute('empresa_id'));
    $producto->delete();

    $this->redirect('producto/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {

      $producto = $form->save();
      $foto = $form->getValue('foto');

      if(!empty($foto))
      {
        $nombre_archivo = "producto_" . $producto->getEmpresaId() . "_" . sha1($foto->getOriginalName()) . $foto->getOriginalExtension();
        $foto->save(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo );

        $foto_opt = new Thumbnail(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo);
        $foto_opt->resize(sfConfig::get('app_producto_width'),sfConfig::get('app_producto_height'));
        $foto_opt->save(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo, sfConfig::get('app_imagen_calidad'));

        $producto->setFoto( $nombre_archivo );
        $producto->setMiniatura( 'mini_' . $nombre_archivo);

        $producto->save();

        $miniatura = new Thumbnail(sfConfig::get('sf_upload_dir'). '/' . $nombre_archivo);
        $miniatura->resize(sfConfig::get('app_producto_thumb_width'), sfConfig::get('app_producto_thumb_height'));
        $miniatura->save(sfConfig::get('sf_upload_dir'). '/mini/' . 'mini_' . $nombre_archivo, sfConfig::get('app_imagen_calidad'));
      }
      $this->redirect('producto/index');
    }
  }

  protected function hasPermisoCreateProducto($id)
  {
    $num_productos = ProductoPeer::getNumProductosByEmpresaId($id);
    if($this->getUser()->hasCredential('Basico'))
    {
      if($num_productos < sfConfig::get('app_productos_basico'))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    else if($this->getUser()->hasCredential('Intermedio'))
    {
      if($num_productos < sfConfig::get('app_productos_intermedio'))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    else if($this->getUser()->hasCredential('Avanzado'))
    {
      if($num_productos < sfConfig::get('app_productos_avanzado'))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    else
    {
      return false;
    }

  }
}
