<?php

/**
 * test actions.
 *
 * @package    kcatoes
 * @subpackage test
 * @author     Adrien Couet
 */
class testActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->getUser()->setAttribute('urlDeTest', 'http://www.keyconsulting.fr/');
    $this->getUser()->setAttribute('testsSelectionnes', array(1, 2, 3, 4, 5, 6, 7));

    //A terme, initialisé par la configuration des tests
    $this->urlDeTest = $this->getUser()->getAttribute('urlDeTest');
//    $this->urlDeTest = 'www.jesuisdeconnecte.fr';      //404
//    $this->urlDeTest = 'http://abonnes.lemonde.fr/';   //302
//    $this->urlDeTest = 'toto';                         //Syntaxe invalide
//    $this->urlDeTest = 'http://www.keyconsulting.fr/images/KeyConsulting.jpg'; //Format invalide

    $listeIds = $this->getUser()->getAttribute('testsSelectionnes');
    $this->tests = Doctrine::getTable('Test')->getCollectionFromIds($listeIds);

  }

  /**
   *
   *
   * @param sfWebRequest $request
   */
  public function executeExecute(sfWebRequest $request)
  {
    $this->urlDeTest = $this->getUser()->getAttribute('urlDeTest');
    $listeIds = $this->getUser()->getAttribute('testsSelectionnes');
    $this->tests = Doctrine::getTable('Test')->getCollectionFromIds($listeIds);

    $page = new page($this->urlDeTest, sfContext::getInstance()->getLogger());
    try
    {
      $page->buildCrawler();
    }
    catch (KcatoesCrawlerException $e)
    {
      $this->message = $e->getMessage();
    }

    $tester = new Tester($page,
                         $this->tests,
                         sfContext::getInstance()->getLogger());
    $tester->executeTest();
    $this->message = 'Traitement terminé';
    $this->cheminFichierCsv = $tester->toCSV();
  }

}
