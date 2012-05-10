<?php

/**
 * Noticia form.
 *
 * @package    fonacot
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class NoticiaForm extends BaseNoticiaForm
{
  public function configure()
  {
    unset($this['empresa_id']);
    unset($this['fecha_publicacion']);
    unset($this['fecha_cancelacion']);
    unset($this['slot']);
  }
}
