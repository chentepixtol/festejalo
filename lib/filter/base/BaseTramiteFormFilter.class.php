<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Tramite filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTramiteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'recepcion_del_credito' => new sfWidgetFormFilterInput(),
      'recepcion_del_tramite' => new sfWidgetFormFilterInput(),
      'persona_encargada'     => new sfWidgetFormFilterInput(),
      'horario'               => new sfWidgetFormFilterInput(),
      'procedimiento'         => new sfWidgetFormFilterInput(),
      'documentacion'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'recepcion_del_credito' => new sfValidatorPass(array('required' => false)),
      'recepcion_del_tramite' => new sfValidatorPass(array('required' => false)),
      'persona_encargada'     => new sfValidatorPass(array('required' => false)),
      'horario'               => new sfValidatorPass(array('required' => false)),
      'procedimiento'         => new sfValidatorPass(array('required' => false)),
      'documentacion'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tramite_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tramite';
  }

  public function getFields()
  {
    return array(
      'empresa_id'            => 'ForeignKey',
      'recepcion_del_credito' => 'Text',
      'recepcion_del_tramite' => 'Text',
      'persona_encargada'     => 'Text',
      'horario'               => 'Text',
      'procedimiento'         => 'Text',
      'documentacion'         => 'Text',
    );
  }
}
