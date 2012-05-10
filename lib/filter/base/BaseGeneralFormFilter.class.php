<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * General filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseGeneralFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'telefono'   => new sfWidgetFormFilterInput(),
      'fax'        => new sfWidgetFormFilterInput(),
      'sitio_web'  => new sfWidgetFormFilterInput(),
      'email'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'telefono'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fax'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sitio_web'  => new sfValidatorPass(array('required' => false)),
      'email'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('general_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'General';
  }

  public function getFields()
  {
    return array(
      'empresa_id' => 'ForeignKey',
      'telefono'   => 'Number',
      'fax'        => 'Number',
      'sitio_web'  => 'Text',
      'email'      => 'Text',
    );
  }
}
