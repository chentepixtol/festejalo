<?php

class ProductoPeer extends BaseProductoPeer
{

  /**
   * Obtener el numero de Productos de una Empresa
   * @param $empresa_id
   * @return int
   */
  public static function getNumProductosByEmpresaId($empresa_id)
  {
    $c = new Criteria();
    $c->add(self::EMPRESA_ID,$empresa_id);
    return self::doCount($c);
  }

  /**
   * Obtiene el indice de Lucene
   * @return unknown_type
   */
  static public function getLuceneIndex()
  {
    ProjectConfiguration::registerZend();

    if (file_exists($index = self::getLuceneIndexFile()))
    {
      return Zend_Search_Lucene::open($index);
    }
    else
    {
      return Zend_Search_Lucene::create($index);
    }
  }

  /**
   * Obtiene el Archivo del indice de Lucene
   * @return unknown_type
   */
  static public function getLuceneIndexFile()
  {
    return sfConfig::get('sf_data_dir').'/productos.index';
  }

  public static function doDeleteAll($con = null)
  {
    if (file_exists($index = self::getLuceneIndexFile()))
    {
      sfToolkit::clearDirectory($index);
      rmdir($index);
    }

    return parent::doDeleteAll($con);
  }

  public static function getLuceneQuery($query)
  {
    $hits = self::getLuceneIndex()->find($query);

    $pks = array();
    foreach ($hits as $hit)
    {
      $pks[] = $hit->pk;
    }
    return self::retrieveByPKs($pks);
  }
  
  /**
   * Obtiene Criteria de los Resultados
   * @param $query
   * @return Criteria
   */
  public static function getLuceneQueryCriteria($query)
  {
    $c = new Criteria();
    $hits = self::getLuceneIndex()->find($query);

    $pks = array();
    foreach ($hits as $hit)
    {
      $pks[] = $hit->pk;
    }
    $c->add(self::ID,$pks,Criteria::IN);
    return $c;

  }

}
