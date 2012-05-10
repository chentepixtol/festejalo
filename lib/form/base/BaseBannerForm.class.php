<?php

/**
 * Banner form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseBannerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'empresa_id'   => new sfWidgetFormPropelChoice(array('model' => 'Empresa', 'add_empty' => false)),
      'titulo'       => new sfWidgetFormInput(),
      'texto'        => new sfWidgetFormTextarea(),
      'slot'         => new sfWidgetFormInput(),
      'imagen'       => new sfWidgetFormInput(),
      'tipo'         => new sfWidgetFormInput(),
      'segmento_id'  => new sfWidgetFormPropelChoice(array('model' => 'Segmento', 'add_empty' => true)),
      'categoria_id' => new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Banner', 'column' => 'id', 'required' => false)),
      'empresa_id'   => new sfValidatorPropelChoice(array('model' => 'Empresa', 'column' => 'id')),
      'titulo'       => new sfValidatorString(array('max_length' => 150)),
      'texto'        => new sfValidatorString(array('required' => false)),
      'slot'         => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'imagen'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tipo'         => new sfValidatorInteger(array('required' => false)),
      'segmento_id'  => new sfValidatorPropelChoice(array('model' => 'Segmento', 'column' => 'id', 'required' => false)),
      'categoria_id' => new sfValidatorPropelChoice(array('model' => 'Categoria', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('banner[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banner';
  }


}
