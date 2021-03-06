<?php
namespace Kcatoes\rgaa;

// FIXME : test à implémenter

class AbsenceUnitesAbsoluesStyleCaracteresElementsFormulaires extends \ASource
{

  const testName = 'Absence d\'unités absolues ou de pixel dans les feuilles de styles pour la taille de caractère des éléments de formulaire';
  const testId = '7.14';
  protected static $testProc = array(
     'Si l\'une des valeurs mentionnées dans le champ d\'application est présente dans la feuille de style,
      poursuivre le test, sinon le test est non applicable.'
    ,'Si la propriété CSS utilisant cette valeur est la propriété font-size ou font, poursuivre le test,
      sinon le test est non applicable.'
    ,'Si cette propriété est utilisée pour styler un élément de formulaire (input, textarea, select, button),
      poursuivre le test, sinon le test est non applicable.'
    ,'Si la propriété CSS utilisant cette valeur n\'est pas utilisée pour le media screen, projection,
      handheld ou tv, le test est validé, sinon le test est invalidé.'
  );
  protected static $testDocLinks = array(
     'F80'  => 'http://www.w3.org/TR/2010/NOTE-WCAG20-TECHS-20101014/F80'
  );

  protected static $testGroups = array(
     'niveau'     => 'AA'
    ,'thematique' => 'Présentation'
    ,'profils'    => array('Développeur', 'Intégrateur')
  );

  public function execute()
  {
    $crawler = $this->page->crawler;

    $elements   = 'pt, pc, px, cm, mm, in';

    $nodes = $crawler->filter($elements);

    if (count($nodes) == 0) {
       $this->addResult(null, \Resultat::NA, 'Test non applicable');
    }
    else {
        $this->addResult($node, \Resultat::MANUEL, 'Vérifier que la propriété
        CSS utilisant cette valeur n\'est pas utilisée pour le media screen,
        projection, handheld ou tv');
    }
  }
}
