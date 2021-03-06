<?php

/**
 * ScenarioTemplate
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    kcatoes
 * @subpackage model
 * @author     Key Consulting
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ScenarioTemplate extends BaseScenarioTemplate
{
  public function __toString()
  {
  	$nbPages = count($this->getCollectionPages());
  	$plural = ($nbPages>1)?'s':'';
  	return $this->getNom().' &ndash; '.$nbPages.' page'.$plural;
  }
}