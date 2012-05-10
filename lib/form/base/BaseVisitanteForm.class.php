<?php

/**
 * Visitante form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseVisitanteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'username'        => new sfWidgetFormInput(),
      'password'        => new sfWidgetFormInput(),
      'email'           => new sfWidgetFormInput(),
      'nombre'          => new sfWidgetFormInput(),
      'apellidos'       => new sfWidgetFormInput(),
      'tarjeta_fonacot' => new sfWidgetFormInput(),
      'promocion_list'  => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'Visitante', 'column' => 'id', 'required' => false)),
      'username'        => new sfValidatorString(array('max_length' => 30)),
      'password'        => new sfValidatorString(array('max_length' => 36)),
      'email'           => new sfValidatorString(array('max_length' => 150)),
      'nombre'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'apellidos'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'tarjeta_fonacot' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'promocion_list'  => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Visitante', 'column' => array('username'))),
        new sfValidatorPropelUnique(array('model' => 'Visitante', 'column' => array('email'))),
      ))
    );

    $this->widgetSchema->setNameFormat('visitante[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Visitante';
  }


}
