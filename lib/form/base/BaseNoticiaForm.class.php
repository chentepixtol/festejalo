<?php

/**
 * Noticia form base class.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseNoticiaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'empresa_id'        => new sfWidgetFormPropelChoice(array('model' => 'Empresa', 'add_empty' => false)),
      'titulo'            => new sfWidgetFormInput(),
      'texto'             => new sfWidgetFormTextarea(),
      'fecha_publicacion' => new sfWidgetFormDate(),
      'fecha_cancelacion' => new sfWidgetFormDate(),
      'slot'              => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Noticia', 'column' => 'id', 'required' => false)),
      'empresa_id'        => new sfValidatorPropelChoice(array('model' => 'Empresa', 'column' => 'id')),
      'titulo'            => new sfValidatorString(array('max_length' => 150)),
      'texto'             => new sfValidatorString(array('required' => false)),
      'fecha_publicacion' => new sfValidatorDate(array('required' => false)),
      'fecha_cancelacion' => new sfValidatorDate(array('required' => false)),
      'slot'              => new sfValidatorString(array('max_length' => 150, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('noticia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Noticia';
  }


}
