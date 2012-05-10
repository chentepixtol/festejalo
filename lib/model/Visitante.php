<?php

class Visitante extends BaseVisitante
{
  public function setPassword($v)
  {
    $v = md5($v);
    return parent::setPassword($v);
  }
}
