<?php
namespace Kcatoes\rgaa;

// FIXME : test à implémenter

class PresenceDUnResumePourLesTableauxDeDonnees extends \ASource
{
  const testName = 'Présence d’un résumé pour les tableaux de données';
  const testId = '11.8';
  protected static $testProc = array(
    'Si l’élément mentionné dans le champ d’application est présent dans la page,
     poursuivre le test, sinon le test est non applicable.',
    'Si l’élément possède un attribut summary, le test est validé, sinon le test est invalidé.'
  );
  protected static $testDocLinks = array(
  'H73' => 'http://www.w3.org/TR/WCAG20-TECHS/H73'
  );

  protected static $testGroups = array(
     'niveau'     => 'A'
    ,'thematique' => 'Tableaux'
    ,'profils'    => array('Développeur', 'Intégrateur', 'Rédacteur', 'Contributeur')
  );

  public function execute()
  {
    $this->addResult(null, \Resultat::NA, 'Test non implémenté');
  }
}