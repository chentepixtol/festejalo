<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Ubicacion filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseUbicacionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'calle'         => new sfWidgetFormFilterInput(),
      'numero'        => new sfWidgetFormFilterInput(),
      'colonia'       => new sfWidgetFormFilterInput(),
      'codigo_postal' => new sfWidgetFormFilterInput(),
      'delegacion'    => new sfWidgetFormFilterInput(),
      'estado_id'     => new sfWidgetFormPropelChoice(array('model' => 'Estado', 'add_empty' => true)),
      'latitud'       => new sfWidgetFormFilterInput(),
      'longitud'      => new sfWidgetFormFilterInput(),
      'metro'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'calle'         => new sfValidatorPass(array('required' => false)),
      'numero'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'colonia'       => new sfValidatorPass(array('required' => false)),
      'codigo_postal' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'delegacion'    => new sfValidatorPass(array('required' => false)),
      'estado_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Estado', 'column' => 'id')),
      'latitud'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitud'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'metro'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ubicacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ubicacion';
  }

  public function getFields()
  {
    return array(
      'empresa_id'    => 'ForeignKey',
      'calle'         => 'Text',
      'numero'        => 'Number',
      'colonia'       => 'Text',
      'codigo_postal' => 'Number',
      'delegacion'    => 'Text',
      'estado_id'     => 'ForeignKey',
      'latitud'       => 'Number',
      'longitud'      => 'Number',
      'metro'         => 'Text',
    );
  }
}
