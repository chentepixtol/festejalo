<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * VisitanteCupon filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseVisitanteCuponFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'visitante_id' => new sfWidgetFormPropelChoice(array('model' => 'Visitante', 'add_empty' => true)),
      'cupon_id'     => new sfWidgetFormPropelChoice(array('model' => 'Cupon', 'add_empty' => true)),
      'codigo'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'visitante_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Visitante', 'column' => 'id')),
      'cupon_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cupon', 'column' => 'id')),
      'codigo'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('visitante_cupon_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VisitanteCupon';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'visitante_id' => 'ForeignKey',
      'cupon_id'     => 'ForeignKey',
      'codigo'       => 'Text',
    );
  }
}
