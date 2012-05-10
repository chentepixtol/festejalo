<?php
/**
 * Banner form.
 *
 * @package    fonacot
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class AdminBannerForm extends BaseBannerForm
{
  public function configure()
  {
    unset($this['slot']);

    $this->setWidget('tipo', new sfWidgetFormChoice(array('choices' => 
       array(BannerPeer::BASICO => 'Basico', 
             BannerPeer::SEGMENTO => 'Segmento', 
             BannerPeer::CATEGORIA => 'Categoria',
             BannerPeer::PREMIUM => 'Premium',
             ))
    ));
    $this->setValidator('tipo', new sfValidatorChoice(array('choices' => 
       array(BannerPeer::BASICO, BannerPeer::SEGMENTO, BannerPeer::PREMIUM, BannerPeer::CATEGORIA,))
    ));
    
    $this->setWidget('imagen', new sfWidgetFormInputFile());

    if($this->isNew())
    {
      $this->setValidator('imagen', new sfValidatorFile(array(
        'required' => true,
        'mime_types' => 'web_images',
      )));
    }
    else
    {
      $this->setValidator('imagen', new sfValidatorFile(array(
        'required' => false,
        'mime_types' => 'web_images',
      )));
    }
  }
}