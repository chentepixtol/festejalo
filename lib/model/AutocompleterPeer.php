<?php

class AutocompleterPeer extends BaseAutocompleterPeer
{
  public static function addSuggest($query)
  {
    $c = new Criteria();
    $c->add(AutocompleterPeer::SUGGEST,$query);
    $auto = self::doSelectOne($c);
    if(empty($auto))
    {
      $auto = new Autocompleter();
      $auto->setSuggest($query);
      $auto->save(); 
    }
  }
  public static function getSuggests($query)
  {
    $words = array();
    $c = new Criteria();
    $c->add(AutocompleterPeer::SUGGEST, $query."%", Criteria::LIKE);
    $autocomplets = AutocompleterPeer::doSelect($c);
    foreach($autocomplets as $auto)
    {
      $words[] = $auto->getSuggest(); 
    }
    return $words;
  }
}
