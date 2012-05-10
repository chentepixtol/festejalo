<?php

/**
 * Micrositio form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMicrositioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'    => new sfWidgetFormInputHidden(),
      'quienes_somos' => new sfWidgetFormInput(),
      'mision'        => new sfWidgetFormTextarea(),
      'vision'        => new sfWidgetFormTextarea(),
      'logo'          => new sfWidgetFormInput(),
      'mini_logo'     => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'empresa_id'    => new sfValidatorPropelChoice(array('model' => 'Empresa', 'column' => 'id', 'required' => false)),
      'quienes_somos' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mision'        => new sfValidatorString(array('required' => false)),
      'vision'        => new sfValidatorString(array('required' => false)),
      'logo'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mini_logo'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('micrositio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Micrositio';
  }


}
