<?php

/**
 * Visitante form.
 *
 * @package    fonacot
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class VisitanteForm extends BaseVisitanteForm
{
  public function configure()
  {
    $this->setWidget('password', new sfWidgetFormInputPassword());
    $this->setValidator('email', new sfValidatorEmail());
    
    $this->setWidget('captcha', new sfWidgetFormReCaptcha(array(
      'public_key' => "6LcMcAYAAAAAANYPuINKbX-Nq4f7ljbn2Yc352fg", 
    )));
    
    $this->setValidator('captcha', new sfValidatorReCaptcha(array(
     'private_key' => "6LcMcAYAAAAAAGZTd7P5Pcdl_uYy4FWwBLy3W_fG",
    )));
    
    
  }
}
