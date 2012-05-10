<?php
class VisitanteSessionForm extends sfForm
{
  public function configure()
  {
    $this->setWidget('username', new sfWidgetFormInput());
    $this->setValidator('username', new sfValidatorString(array('max_length' => 30)));

    $this->setWidget('password', new sfWidgetFormInputPassword());
    $this->setValidator('password', new sfValidatorString(array('max_length' => 36)));

    $this->widgetSchema->setNameFormat('visitante[%s]');
  }
}
?>