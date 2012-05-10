<?php

/**
 * Empresa form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmpresaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'user_id'            => new sfWidgetFormPropelChoice(array('model' => 'Perfil', 'add_empty' => false, 'key_method' => 'getUserId')),
      'nombre'             => new sfWidgetFormInput(),
      'descripcion'        => new sfWidgetFormInput(),
      'afiliacion_fonacot' => new sfWidgetFormInput(),
      'slot'               => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'Empresa', 'column' => 'id', 'required' => false)),
      'user_id'            => new sfValidatorPropelChoice(array('model' => 'Perfil', 'column' => 'user_id')),
      'nombre'             => new sfValidatorString(array('max_length' => 150)),
      'descripcion'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'afiliacion_fonacot' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'slot'               => new sfValidatorString(array('max_length' => 150, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('empresa[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Empresa';
  }


}
