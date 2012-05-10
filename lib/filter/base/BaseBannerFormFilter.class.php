<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Banner filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseBannerFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'   => new sfWidgetFormPropelChoice(array('model' => 'Empresa', 'add_empty' => true)),
      'titulo'       => new sfWidgetFormFilterInput(),
      'texto'        => new sfWidgetFormFilterInput(),
      'slot'         => new sfWidgetFormFilterInput(),
      'imagen'       => new sfWidgetFormFilterInput(),
      'tipo'         => new sfWidgetFormFilterInput(),
      'segmento_id'  => new sfWidgetFormPropelChoice(array('model' => 'Segmento', 'add_empty' => true)),
      'categoria_id' => new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'empresa_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Empresa', 'column' => 'id')),
      'titulo'       => new sfValidatorPass(array('required' => false)),
      'texto'        => new sfValidatorPass(array('required' => false)),
      'slot'         => new sfValidatorPass(array('required' => false)),
      'imagen'       => new sfValidatorPass(array('required' => false)),
      'tipo'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'segmento_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Segmento', 'column' => 'id')),
      'categoria_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Categoria', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('banner_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banner';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'empresa_id'   => 'ForeignKey',
      'titulo'       => 'Text',
      'texto'        => 'Text',
      'slot'         => 'Text',
      'imagen'       => 'Text',
      'tipo'         => 'Number',
      'segmento_id'  => 'ForeignKey',
      'categoria_id' => 'ForeignKey',
    );
  }
}
