<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Micrositio filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMicrositioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'quienes_somos' => new sfWidgetFormFilterInput(),
      'mision'        => new sfWidgetFormFilterInput(),
      'vision'        => new sfWidgetFormFilterInput(),
      'logo'          => new sfWidgetFormFilterInput(),
      'mini_logo'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'quienes_somos' => new sfValidatorPass(array('required' => false)),
      'mision'        => new sfValidatorPass(array('required' => false)),
      'vision'        => new sfValidatorPass(array('required' => false)),
      'logo'          => new sfValidatorPass(array('required' => false)),
      'mini_logo'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('micrositio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Micrositio';
  }

  public function getFields()
  {
    return array(
      'empresa_id'    => 'ForeignKey',
      'quienes_somos' => 'Text',
      'mision'        => 'Text',
      'vision'        => 'Text',
      'logo'          => 'Text',
      'mini_logo'     => 'Text',
    );
  }
}
