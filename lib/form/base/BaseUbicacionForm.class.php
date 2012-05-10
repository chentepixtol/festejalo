<?php

/**
 * Ubicacion form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseUbicacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'    => new sfWidgetFormInputHidden(),
      'calle'         => new sfWidgetFormInput(),
      'numero'        => new sfWidgetFormInput(),
      'colonia'       => new sfWidgetFormInput(),
      'codigo_postal' => new sfWidgetFormInput(),
      'delegacion'    => new sfWidgetFormInput(),
      'estado_id'     => new sfWidgetFormPropelChoice(array('model' => 'Estado', 'add_empty' => true)),
      'latitud'       => new sfWidgetFormInput(),
      'longitud'      => new sfWidgetFormInput(),
      'metro'         => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'empresa_id'    => new sfValidatorPropelChoice(array('model' => 'Empresa', 'column' => 'id', 'required' => false)),
      'calle'         => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'numero'        => new sfValidatorInteger(array('required' => false)),
      'colonia'       => new sfValidatorString(array('max_length' => 200)),
      'codigo_postal' => new sfValidatorInteger(),
      'delegacion'    => new sfValidatorString(array('max_length' => 150)),
      'estado_id'     => new sfValidatorPropelChoice(array('model' => 'Estado', 'column' => 'id', 'required' => false)),
      'latitud'       => new sfValidatorNumber(array('required' => false)),
      'longitud'      => new sfValidatorNumber(array('required' => false)),
      'metro'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ubicacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ubicacion';
  }


}
