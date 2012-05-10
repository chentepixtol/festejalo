<?php

class BannerPeer extends BaseBannerPeer
{
  
  const BASICO = 1;
  
  const SEGMENTO = 2;
  
  const CATEGORIA = 3;
  
  const PREMIUM = 4;
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
    return sfConfig::get('sf_data_dir').'/banners.index';
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
