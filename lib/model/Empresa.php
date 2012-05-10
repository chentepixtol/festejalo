<?php

class Empresa extends BaseEmpresa
{
  public function __toString()
  {
    return $this->getNombre();
  }
  
  public function save(PropelPDO $con = null)
  {
    if(!$this->getSlot())
    {
      $this->setSlot(Fonacot::slugify($this->getNombre()));
    }
    
    return parent::save($con);
  }
  
 public function getDescription()
  {
    sfApplicationConfiguration::getActive()->loadHelpers('Text');
    return truncate_text(strip_tags($this->getDescripcion()),150);
  }
  
  public function getNivel()
  {
    $usuario = sfGuardUserPeer::retrieveByPK($this->getUserId());
    $permisos = $usuario->getAllPermissionNames(); 
    return $permisos[0];
  }
}
