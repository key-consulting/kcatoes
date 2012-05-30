<?php
namespace Kcatoes\rgaa;

// FIXME : test à implémenter

class AbsenceAlterationComprehensionStylesDesactives extends \ASource
{
  
  const testName = 'Absence d\'altération de la compréhension lors de la lecture d\'un bloc d\'informations lorsque les styles sont désactivés';
  const testId = '7.2';
  protected static $testProc = array(
     'Si un segment de texte est présent dans la page, poursuivre le test, sinon le test est non applicable.'
    ,'Si les styles CSS associés au bloc d\'informations sont désactivés et que celui-ci peut être lu sans 
      qu\'un autre bloc d\'informations ne vienne nuire à sa compréhension et sans que les relations logiques 
      avec les autres blocs ne soient plus perceptibles, le test est validé, sinon le test est invalidé.'
  );
  protected static $testDocLinks = array(
     'G59' => 'http://www.w3.org/TR/WCAG20-TECHS/G59'
    ,'F1'  => 'http://www.w3.org/TR/2010/NOTE-WCAG20-TECHS-20101014/F1'
  );

  protected static $testGroups = array(
     'niveau'     => 'A'
    ,'thematique' => 'Présentation'
    ,'profils'    => array('Développeur', 'Intégrateur')
  );
  
  public function execute()
  {
    $crawler = $this->page->crawler;

    /*
      Champ d'application
      
      Tout bloc d'informations (mot, groupe de mots, phrase, bloc de texte), contenu ou non dans un élément HTML, 
      ou généré via du code javascript ou des feuilles de styles.
     */
    $elements   = '';

    $nodes = $crawler->filter($elements);

    /*
      $this->addResult($node, \Resultat::ECHEC, '');
      $this->addResult($node, \Resultat::REUSSITE, '');
      $this->addResult(null,  \Resultat::NA, '');
      $this->addResult($node, \Resultat::MANUEL, '');
      $this->addResult(null, \Resultat::MANUEL, '');
      
      foreach ($nodes as $node)
      {
      }

      if (count($nodes) == 0)
      {
      }
     */
     $this->addResult(null, \Resultat::NON_EXEC, 'Pas implémenté');

  }
}
