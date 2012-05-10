<?php

class Perfil extends BasePerfil
{
  public function __toString()
  {
    return $this->getApellidoPaterno() . " " . $this->getNombre();
  }
}
