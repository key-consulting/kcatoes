<?php
namespace Kcatoes\rgaa;

// FIXME : test à implémenter

class PresenceInformationAutreQueCouleurCSS extends \ASource
{

  const testName = 'Présence d\'un moyen de transmission de l\'information autre qu\'une mise en couleur réalisée par des styles CSS';
  const testId = '2.3';
  protected static $testProc = array(
     'Si l\'un des éléments mentionnés dans le champ d\'application est présent dans la page,
      poursuivre le test, sinon le test est non applicable.'
    ,'Si l\'élément apporte de l\'information par la couleur, poursuivre le test, sinon le
      test est non applicable.'
    ,'Si l\'information apportée par la couleur est accessible par un autre moyen que la couleur,
      le test est validé, sinon le test est invalidé.');
  protected static $testDocLinks = array(
     'G14'  => 'http://www.w3.org/TR/WCAG20-TECHS/G14'
    ,'G138' => 'http://www.w3.org/TR/WCAG20-TECHS/G138'
    ,'F81'  => 'http://www.w3.org/TR/2010/NOTE-WCAG20-TECHS-20101014/F81'
  );

  protected static $testGroups = array(
     'niveau'     => 'A'
    ,'thematique' => 'Couleurs'
    ,'profils'    => array('Rédacteur', 'Contributeur', 'Développeur', 'Intégrateur', 'Graphiste', 'Ergonome')
  );

  public function execute()
  {

    /*
     Champ d'application

      Tout élément HTML ayant des styles utilisant au moins l'une des propriétés CSS suivantes :

          color
          background-color
          background
          border-color
          border
          outline-color
          outline
     */

    /*
      $crawler = $this->page->crawler;
      $elements = '';
      $nodes = $crawler->filter($elements);

      $this->addResult($node, \Resultat::ECHEC, '');
      $this->addResult($node, \Resultat::REUSSITE, '');
      $this->addResult(null,  \Resultat::NA, '');
      $this->addResult($node, \Resultat::MANUEL, '');

     */

     $this->addResult(null, \Resultat::MANUEL, 'Pas implémenté');

  }
}
