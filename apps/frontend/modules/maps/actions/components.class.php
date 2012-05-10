<?php
class mapsComponents extends sfComponents
{
  public function executeGlobal()
  {
    $c = new Criteria();
    $this->ubicaciones = UbicacionPeer::doSelectJoinAll($c);
   // $this->width = 450;
    $this->height = 400;
  }
} 
?>