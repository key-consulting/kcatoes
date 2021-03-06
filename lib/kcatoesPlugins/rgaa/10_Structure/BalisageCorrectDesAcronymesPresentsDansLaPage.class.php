<?php
namespace Kcatoes\rgaa;

// FIXME : test à implémenter

class BalisageCorrectDesAcronymesPresentsDansLaPage extends \ASource
{
  const testName = 'Balisage correct des acronymes présents dans la page';
  const testId = '10.10';
  protected static $testProc = array(
    'Si un segment de texte mentionné dans le champ d\'application est présent dans la page,
     poursuivre le test, sinon le test est non applicable.',
    'Si au minimum lors la première occurrence de chaque segment de texte, rencontrée dans l\'ordre
     du code source de la page, l\'utilisateur n\'a pas accès à la version complète du segment de texte
     par au moins un des mécanismes suivants : la version complète du segment de texte est donnée
     de façon adjacente à celui-ci,le segment de texte est un lien vers sa version complète,
     le segment de texte est un lien avec un attribut title donnant sa version complète,
     un glossaire donnant la version complète du segment de texte est présent sur le site,
     poursuivre le test, sinon le test est non applicable.',
    'Si au minimum la première occurrence du segment de texte est contenue dans un élément acronym
     avec un attribut title non vide, le test est validé, sinon le test est invalidé.'
  );
  protected static $testDocLinks = array(
  'G55' => 'http://www.w3.org/TR/WCAG20-TECHS/G55'
  , 'G70' => 'http://www.w3.org/TR/WCAG20-TECHS/G70'
  , 'G97' => 'http://www.w3.org/TR/WCAG20-TECHS/G97'
  , 'H28' => 'http://www.w3.org/TR/WCAG20-TECHS/H28'
  , 'H60' => 'http://www.w3.org/TR/WCAG20-TECHS/H60'
  );

  protected static $testGroups = array(
     'niveau'     => 'AAA'
    ,'thematique' => 'Structure'
    ,'profils'    => array('Développeur', 'Intégrateur', 'Rédacteur', 'Contributeur')
  );

  public function execute()
  {
    $crawler = $this->page->crawler;

    $elements = 'acronym';

    $nodes = $crawler->filter($elements);

    if (count($nodes) == 0) {
       $this->addResult(null, \Resultat::MANUEL, 'Vérifier que le texte ne
       contiendrait pas d\'acronymes non définis');
    }
    else {
      foreach($nodes as $node) {
        if(strlen($node->getAttribute('title')) > 0 ){
          $this->addResult($node, \Resultat::MANUEL, 'Vérifier que la première
          occurrence de cet acronyme a été définie');
        }else{
          $this->addResult($node, \Resultat::ECHEC, 'Cet acronyme n\'a pas
          de titre.');
        }
      }
    }
  }
}