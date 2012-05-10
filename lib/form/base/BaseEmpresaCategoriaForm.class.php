<?php

/**
 * EmpresaCategoria form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmpresaCategoriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'empresa_id'   => new sfWidgetFormPropelChoice(array('model' => 'Empresa', 'add_empty' => false)),
      'categoria_id' => new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'EmpresaCategoria', 'column' => 'id', 'required' => false)),
      'empresa_id'   => new sfValidatorPropelChoice(array('model' => 'Empresa', 'column' => 'id')),
      'categoria_id' => new sfValidatorPropelChoice(array('model' => 'Categoria', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'EmpresaCategoria', 'column' => array('empresa_id', 'categoria_id')))
    );

    $this->widgetSchema->setNameFormat('empresa_categoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmpresaCategoria';
  }


}
