<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * EmpresaSegmento filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmpresaSegmentoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'  => new sfWidgetFormPropelChoice(array('model' => 'Empresa', 'add_empty' => true)),
      'segmento_id' => new sfWidgetFormPropelChoice(array('model' => 'Segmento', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'empresa_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Empresa', 'column' => 'id')),
      'segmento_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Segmento', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('empresa_segmento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmpresaSegmento';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'empresa_id'  => 'ForeignKey',
      'segmento_id' => 'ForeignKey',
    );
  }
}
