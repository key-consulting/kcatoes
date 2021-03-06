<?php
namespace Kcatoes\rgaa;



class AbsenceInterruptionHierarchieTitres extends \ASource
{

	const testName = 'Absence d\'interruption dans la hiérarchie des titres';
	const testId = '10.3';
	protected static $testProc = array(
     'Si l\'un des éléments mentionnés dans le champ d\'application est présent dans la page,
      poursuivre le test, sinon le test est non applicable.'
    ,'Si le premier titre de hiérarchie précédant l\'élément considéré (hn) dans l\'ordre du
      code source est de niveau hn, hn-1 ou hn+x (x inférieur ou égal à 4), le test est validé
      sinon le test est invalidé');
	protected static $testDocLinks = array(
		'H42' => 'http://www.w3.org/TR/WCAG20-TECHS/H42.html'
	);

  protected static $testGroups = array(
     'niveau'     => 'A'
    ,'thematique' => 'Structure'
    ,'profils'    => array('Rédacteur', 'Contributeur', 'Développeur',
    'Intégrateur')
  );

	public function execute()
	{
		$crawler = $this->page->crawler;

		$elements = 'h1, h2, h3, h4, h5, h6';

		$nodes = $crawler->filter($elements);

		$nbPb = 0;
		$cpt = 0;
		$prevLevel = null;
		$prevNode = null;
		foreach ($nodes as $node)
		{
			$level = (int) str_replace('h', '', strtolower($node->nodeName));
			if ($level == 1 || is_null($prevNode))
			{
				$prevLevel = $level;
				$prevNode = $node;
				continue;
			}
			$delta = $level - $prevLevel;
			if ($delta < -4 || $delta > 1)
			{
				$this->addResult($node, \Resultat::ECHEC, 'Rupture constaté dans la
				hiérarchie des titres, courant: h'.$level.', précédent: h'.$prevLevel);
				$nbPb++;
			}
			$prevLevel = $level;
			$prevNode = $node;

			$cpt++;
		}

		if ($nbPb == 0)
		{
			$this->addResult(null, \Resultat::REUSSITE, 'Aucune interruption dans la
			hiérarchie des titres');
		}
	}
}

