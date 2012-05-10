<?php

/**
 * Tramite form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTramiteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'            => new sfWidgetFormInputHidden(),
      'recepcion_del_credito' => new sfWidgetFormInput(),
      'recepcion_del_tramite' => new sfWidgetFormInput(),
      'persona_encargada'     => new sfWidgetFormInput(),
      'horario'               => new sfWidgetFormInput(),
      'procedimiento'         => new sfWidgetFormTextarea(),
      'documentacion'         => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'empresa_id'            => new sfValidatorPropelChoice(array('model' => 'Empresa', 'column' => 'id', 'required' => false)),
      'recepcion_del_credito' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'recepcion_del_tramite' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'persona_encargada'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'horario'               => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'procedimiento'         => new sfValidatorString(array('required' => false)),
      'documentacion'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tramite[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tramite';
  }


}
