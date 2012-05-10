<?php
class anuncioComponents extends sfComponents
{
  public function executeAnunciosAleatorios()
  {
    $c = new Criteria();
    $c->addDescendingOrderByColumn('RAND()');
    $c->add(BannerPeer::TIPO, BannerPeer::BASICO);
    $c->setLimit(sfConfig::get('app_max_anuncios_destacados'));
    $this->banners = BannerPeer::doSelect($c);
  }
  
  public function executeSegmentos()
  {
    $slot = $this->getVar('slot_segmento');
    $criteriaSlot = new Criteria();
    $criteriaSlot->add(SegmentoPeer::SLOT, $slot);
    $segmento = SegmentoPeer::doSelectOne($criteriaSlot);
    $segmento_id = $segmento->getId(); 
    
    $c = new Criteria();
    $c->add(BannerPeer::TIPO, BannerPeer::SEGMENTO);
    $c->add(BannerPeer::SEGMENTO_ID, $segmento_id);
    $c->addDescendingOrderByColumn('RAND()');
    $c->setLimit(sfConfig::get('app_max_anuncios_segmento'));
    $this->banners = BannerPeer::doSelect($c);
    
  }
  
  public function executeCategorias()
  {
    $criteriaSlot = new Criteria();
    $slot = $this->getRequestParameter('slot');
    $criteriaSlot->add(CategoriaPeer::SLOT, $slot);
    $categoria = CategoriaPeer::doSelectOne($criteriaSlot);
    $categoria_id = $categoria->getId(); 
    
    $c = new Criteria();
    $c->add(BannerPeer::TIPO, BannerPeer::CATEGORIA);
    $c->add(BannerPeer::CATEGORIA_ID, $categoria_id);
    $c->addDescendingOrderByColumn('RAND()');
    $c->setLimit(sfConfig::get('app_max_anuncios_categoria'));
    $this->banners = BannerPeer::doSelect($c);
  }
  
}