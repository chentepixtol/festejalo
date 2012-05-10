<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Visitante filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseVisitanteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'        => new sfWidgetFormFilterInput(),
      'password'        => new sfWidgetFormFilterInput(),
      'email'           => new sfWidgetFormFilterInput(),
      'nombre'          => new sfWidgetFormFilterInput(),
      'apellidos'       => new sfWidgetFormFilterInput(),
      'tarjeta_fonacot' => new sfWidgetFormFilterInput(),
      'promocion_list'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'username'        => new sfValidatorPass(array('required' => false)),
      'password'        => new sfValidatorPass(array('required' => false)),
      'email'           => new sfValidatorPass(array('required' => false)),
      'nombre'          => new sfValidatorPass(array('required' => false)),
      'apellidos'       => new sfValidatorPass(array('required' => false)),
      'tarjeta_fonacot' => new sfValidatorPass(array('required' => false)),
      'promocion_list'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('visitante_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Visitante';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'username'        => 'Text',
      'password'        => 'Text',
      'email'           => 'Text',
      'nombre'          => 'Text',
      'apellidos'       => 'Text',
      'tarjeta_fonacot' => 'Text',
      'promocion_list'  => 'Boolean',
    );
  }
}
