<?php

/**
 * Perfil form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePerfilForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'user_id'          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'nombre'           => new sfWidgetFormInput(),
      'apellido_paterno' => new sfWidgetFormInput(),
      'apellido_materno' => new sfWidgetFormInput(),
      'email'            => new sfWidgetFormInput(),
      'telefono'         => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'Perfil', 'column' => 'id', 'required' => false)),
      'user_id'          => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'nombre'           => new sfValidatorString(array('max_length' => 30)),
      'apellido_paterno' => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'apellido_materno' => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'email'            => new sfValidatorString(array('max_length' => 100)),
      'telefono'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Perfil', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('perfil[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Perfil';
  }


}
