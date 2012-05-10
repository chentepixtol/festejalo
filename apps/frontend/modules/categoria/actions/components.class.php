<?php
class categoriaComponents extends sfComponents
{
  public function executeListar()
  {
    $this->form_filter = new CategoriaFilter();
  }
}