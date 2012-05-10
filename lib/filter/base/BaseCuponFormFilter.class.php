<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Cupon filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCuponFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'  => new sfWidgetFormPropelChoice(array('model' => 'Empresa', 'add_empty' => true)),
      'titulo'      => new sfWidgetFormFilterInput(),
      'descripcion' => new sfWidgetFormFilterInput(),
      'numero'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'empresa_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Empresa', 'column' => 'id')),
      'titulo'      => new sfValidatorPass(array('required' => false)),
      'descripcion' => new sfValidatorPass(array('required' => false)),
      'numero'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('cupon_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cupon';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'empresa_id'  => 'ForeignKey',
      'titulo'      => 'Text',
      'descripcion' => 'Text',
      'numero'      => 'Number',
    );
  }
}
