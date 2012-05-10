<?php

/**
 * Empresa filter form.
 *
 * @package    fonacot
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class EmpresaFormFilter extends BaseEmpresaFormFilter
{
  public function configure()
  {
    $this->widgetSchema->setLabel('user_id',"Usuario");
  }
}
