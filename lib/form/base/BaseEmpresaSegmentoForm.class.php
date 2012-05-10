<?php

/**
 * EmpresaSegmento form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmpresaSegmentoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'empresa_id'  => new sfWidgetFormPropelChoice(array('model' => 'Empresa', 'add_empty' => false)),
      'segmento_id' => new sfWidgetFormPropelChoice(array('model' => 'Segmento', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'EmpresaSegmento', 'column' => 'id', 'required' => false)),
      'empresa_id'  => new sfValidatorPropelChoice(array('model' => 'Empresa', 'column' => 'id')),
      'segmento_id' => new sfValidatorPropelChoice(array('model' => 'Segmento', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'EmpresaSegmento', 'column' => array('empresa_id', 'segmento_id')))
    );

    $this->widgetSchema->setNameFormat('empresa_segmento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmpresaSegmento';
  }


}
