<?php
class Fonacot
{
  /**
   *
   * @param string $text
   * @return string
   */
  static public function slugify($text)
  {
    if (empty($text))
    {
      return 'n-a';
    }

    // replace all non letters or digits by -
    $text = preg_replace('/\W+/', '-', $text);

    // trim and lowercase
    $text = strtolower(trim($text, '-'));

    return $text;
  }
  
  public static function start()
  {
    ob_start();
    ob_implicit_flush(0);
  }
  
  public static function stop()
  {
    return ob_get_clean();
  }

}