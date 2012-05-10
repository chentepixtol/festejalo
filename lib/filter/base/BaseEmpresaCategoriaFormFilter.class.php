<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * EmpresaCategoria filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmpresaCategoriaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'   => new sfWidgetFormPropelChoice(array('model' => 'Empresa', 'add_empty' => true)),
      'categoria_id' => new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'empresa_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Empresa', 'column' => 'id')),
      'categoria_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Categoria', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('empresa_categoria_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmpresaCategoria';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'empresa_id'   => 'ForeignKey',
      'categoria_id' => 'ForeignKey',
    );
  }
}
