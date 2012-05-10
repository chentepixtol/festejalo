<?php

/**
 * Empresa form.
 *
 * @package    fonacot
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class EmpresaForm extends BaseEmpresaForm
{
  public function configure()
  {
    unset($this['slot']);
    unset($this['user_id']);
    $this->setWidget('descripcion', new sfWidgetFormTextarea());
  }
}
