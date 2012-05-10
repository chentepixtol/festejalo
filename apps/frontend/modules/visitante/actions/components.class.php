<?php
class visitanteComponents extends sfComponents
{
  public function executeLoginForm()
  {
    if(!$this->getUser()->hasCredential('Visitante'))
    {
      $this->menu = false;
      $this->form = new VisitanteSessionForm();
    }
    else
    {
      $this->menu = true;
      $c = new Criteria();
      $c->add(VisitanteCuponPeer::VISITANTE_ID, $this->getUser()->getAttribute('visitante_id'));
      $this->visitante_cupones = VisitanteCuponPeer::doSelectJoinCupon($c);
    }
  }
}