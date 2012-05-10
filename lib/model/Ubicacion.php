<?php

class Ubicacion extends BaseUbicacion
{
  public function save(PropelPDO $con=null)
  {
    if (is_null($con))
    {
      $con = Propel::getConnection(UbicacionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
    $index = UbicacionPeer::getLuceneIndex();

    $hits = $index->find(md5($this->getEmpresaId()));
    foreach($hits as $hit)
    {
      $index->delete($hit->id);
    }

    $doc = new Zend_Search_Lucene_Document();

    $doc->addField(Zend_Search_Lucene_Field::UnIndexed('pk',$this->getEmpresaId()));
    $doc->addField(Zend_Search_Lucene_Field::UnStored('key',md5($this->getEmpresaId())));

    $doc->addField(Zend_Search_Lucene_Field::UnStored('calle', $this->getCalle(), 'utf-8'));
    $doc->addField(Zend_Search_Lucene_Field::UnStored('colonia',$this->getColonia(), 'utf-8'));
    $doc->addField(Zend_Search_Lucene_Field::UnStored('delegacion', $this->getDelegacion(), 'utf-8'));
    $doc->addField(Zend_Search_Lucene_Field::UnStored('estado',$this->getEstado(), 'utf-8'));

    $index->addDocument($doc);
    $index->commit();

  }

  public function delete(PropelPDO $con = null)
  {
    $index = UbicacionPeer::getLuceneIndex();
    $hits = $index->find(md5($this->getEmpresaId()));
    foreach($hits as $hit)
    {
      $index->delete($hit->id);
    }

    return parent::delete($con);
  }
}
