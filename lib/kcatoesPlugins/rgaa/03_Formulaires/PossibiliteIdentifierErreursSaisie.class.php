<?php
namespace Kcatoes\rgaa;

class PossibiliteIdentifierErreursSaisie extends \ASource
{

  const testName = 'Possibilité d\'identifier les erreurs de saisie';
  const testId = '3.1';
  protected static $testProc = array(
     'Si l\'un des éléments mentionnés dans le champ d\'application est présent dans la page,
      poursuivre le test, sinon le test est non applicable.'
    ,'Si l\'élément est soumis à un contrôle de saisie avant d\'être traité, poursuivre le test,
      sinon le test est non applicable.'
    ,'Si le procédé de contrôle de saisie indique quels sont les champs erronés lors de l\'échec
      du contrôle de saisie et si nécessaire les formats ou types de saisie attendus, le test est
      validé, sinon le test est invalidé.'
  );
  protected static $testDocLinks = array(
     'G83' => 'http://www.w3.org/TR/WCAG20-TECHS/G83'
    ,'G84' => 'http://www.w3.org/TR/WCAG20-TECHS/G84'
    ,'G85' => 'http://www.w3.org/TR/WCAG20-TECHS/G85'
  );

  protected static $testGroups = array(
     'niveau'     => 'A'
    ,'thematique' => 'Formulaires'
    ,'profils'    => array('Développeur', 'Intégrateur', 'Graphiste', 'Ergonome')
  );

  public function execute()
  {

    $crawler = $this->page->crawler;

    $elements = 'form';

    $nodes = $crawler->filter($elements);

    if (count($nodes) == 0) {
      $this->addResult(null, \Resultat::NA, 'Pas de formulaire: test non applicable');
    }
    else {
      foreach($nodes as $node){
        $this->addResult($node, \Resultat::MANUEL, 'Vérifier que le contrôle de
        saisie, si il existe, permet d\'identifier le champ qui pose problème');
      }
    }
  }
}
