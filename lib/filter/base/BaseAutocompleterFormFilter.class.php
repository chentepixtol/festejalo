<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Autocompleter filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAutocompleterFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'suggest' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'suggest' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('autocompleter_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Autocompleter';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'suggest' => 'Text',
    );
  }
}
