<?php

/**
 * Producto form.
 *
 * @package    fonacot
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ProductoForm extends BaseProductoForm
{
  public function configure()
  {
    unset($this['empresa_id']);
    unset($this['slot']);
    unset($this['miniatura']);
    
    $this->setWidget('foto', new sfWidgetFormInputFile());
    
    if($this->isNew())
    {
       $this->setValidator('foto', new sfValidatorFile(array(
         'required' => true,
         'mime_types' => 'web_images',
       )));
    }
    else
    {
       $this->setValidator('foto', new sfValidatorFile(array(
         'required' => false,
         'mime_types' => 'web_images',
       )));
    }
    
  }
}
