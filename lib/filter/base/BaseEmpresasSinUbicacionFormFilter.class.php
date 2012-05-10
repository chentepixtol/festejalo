<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * EmpresasSinUbicacion filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmpresasSinUbicacionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'            => new sfWidgetFormPropelChoice(array('model' => 'Perfil', 'add_empty' => true, 'key_method' => 'getUserId')),
      'nombre'             => new sfWidgetFormFilterInput(),
      'descripcion'        => new sfWidgetFormFilterInput(),
      'afiliacion_fonacot' => new sfWidgetFormFilterInput(),
      'slot'               => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Perfil', 'column' => 'user_id')),
      'nombre'             => new sfValidatorPass(array('required' => false)),
      'descripcion'        => new sfValidatorPass(array('required' => false)),
      'afiliacion_fonacot' => new sfValidatorPass(array('required' => false)),
      'slot'               => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('empresas_sin_ubicacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmpresasSinUbicacion';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'user_id'            => 'ForeignKey',
      'nombre'             => 'Text',
      'descripcion'        => 'Text',
      'afiliacion_fonacot' => 'Text',
      'slot'               => 'Text',
    );
  }
}
