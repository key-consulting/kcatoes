<?php
namespace Kcatoes\rgaa;

// FIXME : test à implémenter

class MaintienDistinctionVisuelleLiens extends \ASource
{

  const testName = 'Maintien de la distinction visuelle des liens';
  const testId = '7.10';
  protected static $testProc = array(
     'Si l\'un des éléments mentionnés dans le champ d\'application est présent dans la page,
      poursuivre le test, sinon le test est non applicable.'
    ,'Si l\'élément est utilisé pour styler les liens, poursuivre le test, sinon le test est non applicable.'
    ,'Si l\'élément ne permet de distinguer les liens uniquement par la couleur,
      poursuivre le test, sinon le test est non applicable.'
    ,'Si le ratio de contraste entre la couleur du texte des liens et celle du texte
      à proximité des liens est supérieur ou égal à 3 et qu\'un élément de distinction
      autre que la couleur est visible lors du focus des liens (graisse, soulignement,
      icône,etc), le test est validé, sinon le test est invalidé.'
  );
  protected static $testDocLinks = array(
     'G183'  => 'http://www.w3.org/TR/WCAG20-TECHS/G183'
    ,'F73'  => 'http://www.w3.org/TR/2010/NOTE-WCAG20-TECHS-20101014/F73'
  );

  protected static $testGroups = array(
     'niveau'     => 'A'
    ,'thematique' => 'Présentation'
    ,'profils'    => array('Développeur', 'Intégrateur', 'Graphiste', 'Ergonome')
  );

  public function execute()
  {

    $crawler = $this->page->crawler;

    $elements   = 'body[link], body[alink], body[vlink]';

    $nodes = $crawler->filter($elements);

    if (count($nodes) == 0) {
       $this->addResult(null, \Resultat::NA, 'Test non applicable');
    }
    else {
        $this->addResult($node, \Resultat::MANUEL, 'Vérifier que le ratio de
        contraste entre la couleur du texte des liens et celle du texte à
        proximité des liens est supérieur ou égal à 3 et qu\'un élément de
        distinction autre que la couleur est visible lors du focus des liens
        (graisse, soulignement, icône,etc)');
    }
  }
}
