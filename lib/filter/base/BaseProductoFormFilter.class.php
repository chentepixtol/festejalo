<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Producto filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseProductoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'   => new sfWidgetFormPropelChoice(array('model' => 'Empresa', 'add_empty' => true)),
      'categoria_id' => new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'add_empty' => true)),
      'nombre'       => new sfWidgetFormFilterInput(),
      'descripcion'  => new sfWidgetFormFilterInput(),
      'foto'         => new sfWidgetFormFilterInput(),
      'miniatura'    => new sfWidgetFormFilterInput(),
      'slot'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'empresa_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Empresa', 'column' => 'id')),
      'categoria_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Categoria', 'column' => 'id')),
      'nombre'       => new sfValidatorPass(array('required' => false)),
      'descripcion'  => new sfValidatorPass(array('required' => false)),
      'foto'         => new sfValidatorPass(array('required' => false)),
      'miniatura'    => new sfValidatorPass(array('required' => false)),
      'slot'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('producto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Producto';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'empresa_id'   => 'ForeignKey',
      'categoria_id' => 'ForeignKey',
      'nombre'       => 'Text',
      'descripcion'  => 'Text',
      'foto'         => 'Text',
      'miniatura'    => 'Text',
      'slot'         => 'Text',
    );
  }
}
