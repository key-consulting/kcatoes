<?php
namespace Kcatoes\rgaa;

class PresenceDUnResumePourLesTableauxDeDonnees extends \ASource
{
  const testName = 'Présence d\'un résumé pour les tableaux de données';
  const testId = '11.8';
  protected static $testProc = array(
    'Si l\'élément mentionné dans le champ d\'application est présent dans la page,
     poursuivre le test, sinon le test est non applicable.',
    'Si l\'élément possède un attribut summary, le test est validé, sinon le test est invalidé.'
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
   $crawler = $this->page->crawler;

   $elements   = 'table';

   $nodes = $crawler->filter($elements);

   if (count($nodes) == 0) {
     $this->addResult(null, \Resultat::NA, 'Il n\'y a pas de tableau de données');
   }
   else {
     foreach($nodes as $node) {
     	if(strlen($node->getAttribute('summary')) > 0 ){
       $this->addResult($node, \Resultat::MANUEL, 'Si il s\'agit d\'un tableau
          de données, le test est validé');
      }else{
       $this->addResult($node, \Resultat::MANUEL, 'Si il s\'agit d\'un tableau
          de données, le test n\'est PAS validé ');
     	}
     }
   }
  }
}