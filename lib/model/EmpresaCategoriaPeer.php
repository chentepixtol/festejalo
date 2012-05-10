<?php

class EmpresaCategoriaPeer extends BaseEmpresaCategoriaPeer
{
  public static function getEmpresasByEmpresaId($id)
  {
    $empresas = array();
    $c = new Criteria();
    $c->add(self::CATEGORIA_ID,$id);
    $emp_cats = self::doSelectJoinEmpresa($c);
    foreach($emp_cats as $emp_cat)
    {
      $empresas[] = $emp_cat->getEmpresa();
    }
    return $empresas;
  }
}
