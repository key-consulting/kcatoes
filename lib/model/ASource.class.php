<?php

/**
 * Classe dont devra hériter le code de chaque test automatisable
 *
 * @package Kcatoes
 * @author Adrien Couet <adrien.couet@keyconsulting.fr>
 */
use Symfony\Component\DomCrawler\Crawler;
abstract class ASource
{
  protected $echecs = array();

  /**
   * Renvoi la liste des objets Echec correspondants aux élément de la page
   * ayant échoué à passer le test
   *
   */
  public function getEchecs()
  {
    return $this->echecs;
  }

  /**
   * Recréée le chemin XPath permettant d'accéder au DOMNode passé en paramètre
   *
   * @param DOMNode $node La node dont il faut recrééer le chemin XPath
   */
  protected  function getXPath(DOMNode $node)
  {
    $domXpath     = new DOMXPath($node->ownerDocument);
    $xpath = '';

    do
    {
      $position = 1 + $domXpath->query('preceding-sibling::*[name()="' . $node->nodeName . '"]', $node)->length;
      $xpath    = '/' . $node->nodeName . '[position()=' . $position . ']' . $xpath;
      $node     = $node->parentNode;
    }
    while (!$node instanceof DOMDocument);

    return $xpath;
  }

  /**
   * Récupère le code source de la DOMNode passée en paramètre
   *
   * @param DOMNode $node La node dont il faut récupérer le code source
   */
  protected function getSourceCode(DOMNode $node)
  {
    $temp_doc  = new DOMDocument('1.0', 'UTF-8');
    $temp_node = $temp_doc->importNode($node, true);
    $temp_doc->appendChild($temp_node);
    return $temp_doc->saveHTML();
  }

  /**
   * Exécute le test implémenté sur une page web
   *
   * @param Page $page La page sur à tester
   */
  abstract public function execute(Page $page);
}
