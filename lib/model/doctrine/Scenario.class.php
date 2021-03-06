<?php

/**
 * Scenario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    kcatoes
 * @subpackage model
 * @author     Key Consulting
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Scenario extends BaseScenario
{

	public function getScenarioPagesInfo()
	{
    $pageInfo = Doctrine_Query::create()
      ->select('sp.required, sp.nom, wp.url, e.type, t.class as tests')
      ->from('ScenarioPage sp')
      ->leftJoin('sp.WebPage wp, wp.CollectionExtracts e, e.CollectionResults t')
      ->where('sp.scenario_id = ?', $this->getId())
      ->orderBy('sp.created_at ASC, e.type ASC')
      ->execute();
    
		return $pageInfo;
	}

	/**
	 * Rappatrie les pages, les extraction, les tests et leur résultat global filtré selon
	 * une liste d'extraction
	 * @param array $extractIds: liste des id des extractions
	 * @throws KcatoesException
	 */
	public function getScenarioPagesForExtractsWithGlobalResult(array $extractIds = null){
    if (is_null($extractIds))
    {
    	throw new KcatoesException('required $extractIds is null');
    }
    else
    {
	    $pages = Doctrine_Query::create()
	      ->select('sp.required, sp.nom, wp.url, e.type, t.class as test, t.result')
	      ->from('ScenarioPage sp')
	      ->leftJoin('sp.WebPage wp, wp.CollectionExtracts e, e.CollectionResults t')
	      ->where('sp.scenario_id = ?', $this->getId())
	      ->andWhereIn('e.id', $extractIds)
	      ->orderBy('sp.created_at ASC, e.type ASC')
	      ->execute();
    
      return $pages;
    }
	}
}