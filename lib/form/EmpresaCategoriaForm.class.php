<?php

/**
 * EmpresaCategoria form.
 *
 * @package    fonacot
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class EmpresaCategoriaForm extends BaseEmpresaCategoriaForm
{
  public function configure()
  {
    unset($this['empresa_id']);
  }
}
