<?php

/**
 * sfGuardUser form.
 *
 * @package    form
 * @subpackage sf_guard_user
 * @version    SVN: $Id: sfGuardUserForm.class.php 13001 2008-11-14 10:45:32Z noel $
 */
class sfGuardUserForm extends sfGuardUserAdminForm
{
  protected
    $pkName = null;

  public function configure()
  {
    parent::configure();

    unset(
      $this['last_login'],
      $this['created_at'],
      $this['salt'],
      $this['algorithm'],
      $this['is_active'],
      $this['is_super_admin'],
      $this['sf_guard_user_group_list'],
      $this['sf_guard_user_permission_list']
    );
    
    $this->setWidget('captcha', new sfWidgetFormReCaptcha(array(
      'public_key' => "6LcMcAYAAAAAANYPuINKbX-Nq4f7ljbn2Yc352fg",
    )));
    
    $this->setValidator('captcha', new sfValidatorReCaptcha(array(
      'private_key' => "6LcMcAYAAAAAAGZTd7P5Pcdl_uYy4FWwBLy3W_fG"
    )));
    
    
  }
}
