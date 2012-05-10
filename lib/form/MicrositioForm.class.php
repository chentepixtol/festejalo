<?php

/**
 * Micrositio form.
 *
 * @package    fonacot
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MicrositioForm extends BaseMicrositioForm
{
  public function configure()
  {
    unset($this['empresa_id']);
    unset($this['mini_logo']);
    
    $this->setWidget('logo', new sfWidgetFormInputFile());
    
    if($this->isNew())
    {  
      $this->setValidator('logo',new sfValidatorFile(array(
        'required' => true,
        'mime_types' => 'web_images',
      )));
    }
    else
    {
      $this->setValidator('logo',new sfValidatorFile(array(
        'required' => false,
        'mime_types' => 'web_images',
      )));
    }
    
    $this->setWidget('quienes_somos', new sfWidgetFormTextarea());
  }
}
