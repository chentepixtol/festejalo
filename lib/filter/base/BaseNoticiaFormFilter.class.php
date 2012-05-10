<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Noticia filter form base class.
 *
 * @package    festejalo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseNoticiaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'        => new sfWidgetFormPropelChoice(array('model' => 'Empresa', 'add_empty' => true)),
      'titulo'            => new sfWidgetFormFilterInput(),
      'texto'             => new sfWidgetFormFilterInput(),
      'fecha_publicacion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'fecha_cancelacion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'slot'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'empresa_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Empresa', 'column' => 'id')),
      'titulo'            => new sfValidatorPass(array('required' => false)),
      'texto'             => new sfValidatorPass(array('required' => false)),
      'fecha_publicacion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_cancelacion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'slot'              => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('noticia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Noticia';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'empresa_id'        => 'ForeignKey',
      'titulo'            => 'Text',
      'texto'             => 'Text',
      'fecha_publicacion' => 'Date',
      'fecha_cancelacion' => 'Date',
      'slot'              => 'Text',
    );
  }
}
