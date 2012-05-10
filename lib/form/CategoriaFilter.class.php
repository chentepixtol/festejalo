<?php
class CategoriaFilter extends sfForm
{
  public function configure()
  {
    $this->setWidget('categoria', new sfWidgetFormPropelChoice(array(
      'model' => 'Categoria',
      'multiple' => true,
      'expanded' => true,
    )));
    
    $this->setValidator('categoria', new sfValidatorPropelChoice(array(
      'model' => 'Categoria',
      'multiple' => true,
    )));
  }
}
?>