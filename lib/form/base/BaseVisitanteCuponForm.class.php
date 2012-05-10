<?php

/**
 * VisitanteCupon form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseVisitanteCuponForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'visitante_id' => new sfWidgetFormPropelChoice(array('model' => 'Visitante', 'add_empty' => false)),
      'cupon_id'     => new sfWidgetFormPropelChoice(array('model' => 'Cupon', 'add_empty' => false)),
      'codigo'       => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'VisitanteCupon', 'column' => 'id', 'required' => false)),
      'visitante_id' => new sfValidatorPropelChoice(array('model' => 'Visitante', 'column' => 'id')),
      'cupon_id'     => new sfValidatorPropelChoice(array('model' => 'Cupon', 'column' => 'id')),
      'codigo'       => new sfValidatorString(array('max_length' => 40, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'VisitanteCupon', 'column' => array('visitante_id', 'cupon_id')))
    );

    $this->widgetSchema->setNameFormat('visitante_cupon[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VisitanteCupon';
  }


}
