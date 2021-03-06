<?php

/**
 * WebPageExtractTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WebPageExtractTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object WebPageExtractTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('WebPageExtract');
    }
    
    /**
     * Retourne les extractions associées à un scénario
     * @param int   $scenarioId L'id du scénario
     * @param array $extractIds Les ids des extractions à considérer
     * @return Doctrine_Collection
     */
    public function searchByScenarioId($scenarioId, $extractIds=null)
    {
      $query = self::getInstance()->createQuery('e')
              ->select('e.id, e.web_page_id, e.src, e.type')
              ->innerJoin('e.WebPage w')
              ->innerJoin('w.ScenarioPages sp')
              ->innerJoin('sp.Scenario s')
              ->where('s.id = ?', $scenarioId);
      
      if ($extractIds != null && is_array($extractIds) && count($extractIds > 0))
      {
        $query->whereIn('e.id', $extractIds);
      }
      return $query->execute();
    }
}