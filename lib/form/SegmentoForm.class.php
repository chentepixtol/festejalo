<?php

/**
 * Segmento form.
 *
 * @package    festejalo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class SegmentoForm extends BaseSegmentoForm
{
  public function configure()
  {
    unset($this['slot']);
    
  }
}
