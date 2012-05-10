<?php

class Segmento extends BaseSegmento
{
  
  public function __toString()
  {
    return $this->getNombre();
  }
  
  public function save(PropelPDO $con= null)
  {
    if(!$this->getSlot())
    {
      $this->setSlot(Fonacot::slugify($this->getNombre()));
    }
    
    return parent::save($con);
  }
  
}
