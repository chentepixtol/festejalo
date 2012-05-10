<?php

class EmpresasSinUbicacion extends BaseEmpresasSinUbicacion
{
  public function __toString()
  {
    return $this->getNombre();
  }
}
