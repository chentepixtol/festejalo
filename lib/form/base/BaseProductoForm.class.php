<?php

/**
 * Producto form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseProductoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'empresa_id'   => new sfWidgetFormPropelChoice(array('model' => 'Empresa', 'add_empty' => false)),
      'categoria_id' => new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'add_empty' => false)),
      'nombre'       => new sfWidgetFormInput(),
      'descripcion'  => new sfWidgetFormTextarea(),
      'foto'         => new sfWidgetFormInput(),
      'miniatura'    => new sfWidgetFormInput(),
      'slot'         => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Producto', 'column' => 'id', 'required' => false)),
      'empresa_id'   => new sfValidatorPropelChoice(array('model' => 'Empresa', 'column' => 'id')),
      'categoria_id' => new sfValidatorPropelChoice(array('model' => 'Categoria', 'column' => 'id')),
      'nombre'       => new sfValidatorString(array('max_length' => 150)),
      'descripcion'  => new sfValidatorString(array('required' => false)),
      'foto'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'miniatura'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'slot'         => new sfValidatorString(array('max_length' => 150, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('producto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Producto';
  }


}
