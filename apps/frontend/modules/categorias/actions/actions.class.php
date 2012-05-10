<?php

/**
 * categorias actions.
 *
 * @package    festejalo
 * @subpackage categorias
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class categoriasActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('categorias', 'listado');
  }
  
  public function executeListado(sfWebRequest $request)
  {
    $c = new Criteria();
    $this->categorias = CategoriaPeer::doSelect($c);
  }
}
