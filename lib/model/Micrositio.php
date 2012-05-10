<?php

class Micrositio extends BaseMicrositio
{
  /**
   * Obtiene la URL absoluta del Logo
   * @return string
   */
  public function getUrlLogo()
  {
    return sfConfig::get('app_upload_dir') .'/'. $this->getLogo();
  }

  /**
   * Obtiene la URL absoluta de la miniatura del Logo
   * @return string
   */
  public function getUrlMiniLogo()
  {
    return sfConfig::get('app_upload_mini_dir') . "/" . $this->getMiniLogo();
  }

  public function save(PropelPDO $con=null)
  {
    if (is_null($con))
    {
      $con = Propel::getConnection(MicrositioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
    }

    $con->beginTransaction();
    try
    {
      $ret = parent::save($con);

      $this->updateLuceneIndex();

      $con->commit();

      return $ret;
    }
    catch (Exception $e)
    {
      $con->rollBack();
      throw $e;
    }
  }
  
  /**
   * Actualiza el index de Lucene
   * @return unknown_type
   */
  public function updateLuceneIndex()
  {
    $index = MicrositioPeer::getLuceneIndex();

    $hits = $index->find(md5($this->getEmpresaId()));
    foreach($hits as $hit)
    {
      $index->delete($hit->id);
    }

    $doc = new Zend_Search_Lucene_Document();

    $doc->addField(Zend_Search_Lucene_Field::UnIndexed('pk',$this->getEmpresaId()));
    $doc->addField(Zend_Search_Lucene_Field::UnStored('key',md5($this->getEmpresaId())));

    $doc->addField(Zend_Search_Lucene_Field::UnStored('quienes_somos', $this->getQuienesSomos(), 'utf-8'));
    $doc->addField(Zend_Search_Lucene_Field::UnStored('mision',strip_tags($this->getMision()), 'utf-8'));
    $doc->addField(Zend_Search_Lucene_Field::unStored('vision',strip_tags($this->getVision()), 'utf-8'));

    $index->addDocument($doc);
    $index->commit();

  }

  public function delete(PropelPDO $con = null)
  {
    $index = MicrositioPeer::getLuceneIndex();
    $hits = $index->find(md5($this->getEmpresaId()));
    foreach($hits as $hit)
    {
      $index->delete($hit->id);
    }

   return parent::delete($con);
  }
  
  
}
