<?php

/**
 * General form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseGeneralForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id' => new sfWidgetFormInputHidden(),
      'telefono'   => new sfWidgetFormInput(),
      'fax'        => new sfWidgetFormInput(),
      'sitio_web'  => new sfWidgetFormInput(),
      'email'      => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'empresa_id' => new sfValidatorPropelChoice(array('model' => 'Empresa', 'column' => 'id', 'required' => false)),
      'telefono'   => new sfValidatorInteger(array('required' => false)),
      'fax'        => new sfValidatorInteger(array('required' => false)),
      'sitio_web'  => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 150, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('general[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'General';
  }


}
