<?php

/**
 * Cupon form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCuponForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'empresa_id'  => new sfWidgetFormPropelChoice(array('model' => 'Empresa', 'add_empty' => false)),
      'titulo'      => new sfWidgetFormInput(),
      'descripcion' => new sfWidgetFormInput(),
      'numero'      => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Cupon', 'column' => 'id', 'required' => false)),
      'empresa_id'  => new sfValidatorPropelChoice(array('model' => 'Empresa', 'column' => 'id')),
      'titulo'      => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'numero'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cupon[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cupon';
  }


}
