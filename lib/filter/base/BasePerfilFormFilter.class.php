<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Perfil filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePerfilFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'          => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'nombre'           => new sfWidgetFormFilterInput(),
      'apellido_paterno' => new sfWidgetFormFilterInput(),
      'apellido_materno' => new sfWidgetFormFilterInput(),
      'email'            => new sfWidgetFormFilterInput(),
      'telefono'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'nombre'           => new sfValidatorPass(array('required' => false)),
      'apellido_paterno' => new sfValidatorPass(array('required' => false)),
      'apellido_materno' => new sfValidatorPass(array('required' => false)),
      'email'            => new sfValidatorPass(array('required' => false)),
      'telefono'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('perfil_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Perfil';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'user_id'          => 'ForeignKey',
      'nombre'           => 'Text',
      'apellido_paterno' => 'Text',
      'apellido_materno' => 'Text',
      'email'            => 'Text',
      'telefono'         => 'Number',
    );
  }
}
