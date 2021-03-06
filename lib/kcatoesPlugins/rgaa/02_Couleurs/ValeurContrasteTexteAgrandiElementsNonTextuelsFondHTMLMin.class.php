<?php
namespace Kcatoes\rgaa;

// FIXME : test à implémenter

class ValeurContrasteTexteAgrandiElementsNonTextuelsFondHTMLMin extends \ASource
{

  const testName = 'Valeur du rapport de contraste du texte agrandi contenu dans des éléments non textuels utilisés comme fond d\'éléments HTML (minimum)';
  const testId = '2.9';
  protected static $testProc = array(
     'Si l\'un des éléments mentionnés dans le champ d\'application est présent dans la page,
      poursuivre le test, sinon le test est non applicable.'
    ,'Si l\'élément permet d\'afficher du texte qui apporte de l\'information, n\'est pas un logo
      ou un texte faisant parti d\'un logo et qu\'aucun mécanisme
      permettant d\'afficher l\'élément avec un rapport de contraste suffisant n\'est présent,
      poursuivre le test, sinon le test est non applicable.'
    ,'Si la taille finale du texte affichée est supérieure ou égale à 150% ou 120% gras de la
      taille du texte par défaut spécifiée par les styles de la page,
      ou, en son absence, de la taille fixée couramment par un navigateur, poursuivre le test,
      sinon le test est non applicable.'
    ,'Si la couleur du texte et celle de son arrière plan ont été définies par la charte
      graphique du service de communication publique en ligne, et que cette
      définition est ultérieure à publication du RGAA, poursuivre le test, sinon le test
      est non applicable.'
    ,'Si le rapport de contraste entre la couleur du texte agrandi et celle de son arrière
      plan est supérieur ou égal à 3, le test est validé, sinon le test est invalidé.');
  protected static $testDocLinks = array(
     'G145' => 'http://www.w3.org/TR/WCAG20-TECHS/G145'
    ,'G174' => 'http://www.w3.org/TR/WCAG20-TECHS/G174'
  );

  protected static $testGroups = array(
     'niveau'     => 'AA'
    ,'thematique' => 'Couleurs'
    ,'profils'    => array('Graphiste', 'Ergonome')
  );

  public function execute()
  {

    /*
      Champ d'application

      Tout élément HTML ayant des styles associés, utilisant au moins l'une des propriétés CSS suivantes :

          background
          background-image
          list
          list-style-image
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
