<?php
namespace Kcatoes\rgaa;

// FIXME : test à implémenter

class AbsenceMiseEnFormeChangementsLuminositeFlash extends \ASource
{

  const testName = 'Absence de mise en forme provoquant des changements brusques de luminosité ou des effets de flash rouge à fréquence élevée';
  const testId = '5.15';
  protected static $testProc = array(
     'Si l\'un des éléments mentionnés dans le champ d\'application est présent dans la page,
      poursuivre le test, sinon le test est non applicable.'
    ,'Si la mise en forme de l\'élément provoque des changements brusques de luminosité ou des
      effets de flash rouge, poursuivre le test, sinon le test est non applicable.'
    ,'Si les changements brusques de luminosité ou les effets de flash rouge se font à une
      fréquence inférieure ou égale à 3 par seconde ou que la surface totale d\'affichage cumulée
      des changements brusques de luminosité ou des effets de flash rouge dans une zone de 341 x 256 pixels
      est inférieure à 25% de celle-ci (21 284 pixels), le test est validé, sinon le test est invalidé.'
  );
  protected static $testDocLinks = array(
     'G15' => 'http://www.w3.org/TR/WCAG20-TECHS/G15'
    ,'G19' => 'http://www.w3.org/TR/WCAG20-TECHS/G19'
  );

  protected static $testGroups = array(
     'niveau'     => 'A'
    ,'thematique' => 'Multimédia'
    ,'profils'    => array('Développeur', 'Intégrateur', 'Rédacteur', 'Contributeur')
  );

  public function execute()
  {
    /*
      Champ d'application

      Tout élément mis en forme par des styles utilisant au moins une des propriétés suivantes :

          background
          background-image
          content
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
