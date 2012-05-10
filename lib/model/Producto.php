<?php

class Producto extends BaseProducto
{
  public function save(PropelPDO $con = null)
  {
    if(!$this->getSlot())
    {
      $this->setSlot(Fonacot::slugify($this->getNombre()));
    }

    if (is_null($con))
    {
      $con = Propel::getConnection(ProductoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
    $index = ProductoPeer::getLuceneIndex();

    $hits = $index->find(md5($this->getId()));
    foreach($hits as $hit)
    {
      $index->delete($hit->id);
    }

    $doc = new Zend_Search_Lucene_Document();

    $doc->addField(Zend_Search_Lucene_Field::UnIndexed('pk',$this->getId()));
    $doc->addField(Zend_Search_Lucene_Field::UnStored('key',md5($this->getId())));

    $doc->addField(Zend_Search_Lucene_Field::UnStored('nombre', $this->getNombre(), 'utf-8'));
    $doc->addField(Zend_Search_Lucene_Field::UnStored('descripcion',$this->getDescripcion(), 'utf-8'));

    $index->addDocument($doc);
    $index->commit();

  }

  public function delete(PropelPDO $con = null)
  {
    $index = ProductoPeer::getLuceneIndex();
    $hits = $index->find(md5($this->getId()));
    foreach($hits as $hit)
    {
      $index->delete($hit->id);
    }

    return parent::delete($con);
  }


  /**
   * Obtiene la URL completa de la foto
   * @return string
   */
  public function getUrlFoto()
  {
    return sfConfig::get('app_upload_dir') . '/' . $this->getFoto();
  }

  /**
   * Obtiene la URL completa de la Miniatura
   * @return string
   */
  public function getUrlMiniatura()
  {
    return sfConfig::get('app_upload_mini_dir') . '/' . $this->getMiniatura();
  }
  
  public function getDescription()
  {
    sfApplicationConfiguration::getActive()->loadHelpers('Text');
    return truncate_text(strip_tags($this->getDescripcion()),150);
  }
}
