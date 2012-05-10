<?php

class myUser extends sfGuardSecurityUser
{
  
  public function getTipoUsuario()
  {
    $permisos =  $this->getPermissionNames();
    foreach($permisos as $permiso)
    {
      return $permiso;
    }
  }
  
}
