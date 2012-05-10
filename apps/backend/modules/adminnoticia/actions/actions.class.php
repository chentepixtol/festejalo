<?php

require_once dirname(__FILE__).'/../lib/adminnoticiaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adminnoticiaGeneratorHelper.class.php';

/**
 * adminnoticia actions.
 *
 * @package    fonacot
 * @subpackage adminnoticia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class adminnoticiaActions extends autoAdminnoticiaActions
{
  public function executeView(sfWebRequest $request)
  {
    $this->noticia = NoticiaPeer::retrieveByPK($request->getParameter('id'));
  }
  
}
