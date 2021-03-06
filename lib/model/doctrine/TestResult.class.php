<?php

/**
 * TestResult
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    kcatoes
 * @subpackage model
 * @author     Key Consulting
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TestResult extends BaseTestResult
{

  /**
   * Sauvegarde d'un résultat de l'exécution d'un test sur une extraction
   * @param WebPageExtract $extract
   * @param ASource $resTest
   * @return TestResult
   */
  public function saveResult(WebPageExtract $extract, ASource $resTest)
  {
    
    $this->setWebPageExtractId($extract->getId());
    $this->setClass(get_class($resTest));
    $this->setNumCategorie($resTest::getNumeroCategorie());
    $this->setNumTest($resTest::getNumeroTest());
    $this->setResult($resTest->getMainResult());
    $this->save();
    
    // Parcours du détail des résultats
    foreach($resTest->getTestResults() as $res)
    {
      // Nouvelle ligne de résultat
      $rLine = new TestResultLine();
      
      $rLine->setTestResult($this);
      
      $rLine->setResult($res['result']);
      $rLine->setComment($res['comment']);
      $rLine->setXpath($res['xpath']);
      $rLine->setCssSelector($res['cssSelector']);
      $rLine->setSource($res['source']);
      $rLine->setPrettySource($res['prettySource']);
      if (is_object($res['node'])) {
        $rLine->setTextContent($res['node']->textContent);
      }
      
      $rLine->save();
    }
    
    return $this;
        
  }

}