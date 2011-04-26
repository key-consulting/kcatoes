<?php

/**
 * Test
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    Kcatoes
 * @subpackage model
 * @author     Adrien Couet <adrien.couet@keyconsulting.fr>
 */
class Test extends BaseTest
{
  private $resultat;

  /**
   * Récupération du nom court à partir
   * du nom pour éxécution du test correspondant
   *
   * @return Le nom court du test
   *
   * @date 23/02/2011
   * @tested
   */
  public function getNomCourt()
  {
    $nomCourt = $this->getNom();
    $accent = array(
      'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'ç' => 'c',
      'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i',
      'î' => 'i', 'ï' => 'i', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o',
      'õ' => 'o', 'ö' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u',
      'ý' => 'y', 'ÿ' => 'y', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A',
      'Ä' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E',
      'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O',
      'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ù' => 'U', 'Ú' => 'U',
      'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y'
    );

    $nomCourt = strtr($nomCourt, $accent);
    $nomCourt = preg_replace('/\W/', ' ', $nomCourt);
    $nomCourt = ucwords(strtolower($nomCourt));
    $nomCourt = preg_replace('/\s/', '', $nomCourt);
    return $nomCourt;
  }

  /**
   * Vérifie si le test est exécutable
   *
   * @return true si le test est exécutable, false sinon
   * @tested
   */
  public function isExecutable()
  {
    if($this->hasExecutable())
    {
      $className = $this->getNomCourt();
      $class = new $className();
      if ($class instanceof ASource)
      {
        return true;
      }
      else
      {
        $this->resultat = new Resultat(Resultat::NON_EXEC);
        $this->resultat->setExplicationErreur('La classe n\'hérite pas de ASource');
        return false;
      }
    }
    else {
      $this->resultat = new Resultat(Resultat::NON_EXEC);
      $this->resultat->setExplicationErreur('Impossible de trouver l\'implémentation');
      return false;
    }
  }

  /**
   * Vérifie la classe implémentant l'exécution du test existe
   *
   */
  private function hasExecutable()
  {
    return class_exists($this->getNomCourt());
  }

  /**
   * Exécute le test
   *
   * @param Page $page La page sur laquelle exécuter le test
   * @tested
   */
  public function execute($page)
  {
    $className = $this->getNomCourt();
    $implementation = new $className();

    try
    {
      $res = $implementation->execute($page);
    }
    catch (KcatoesTestException $e)
    {
      $this->resultat = new Resultat(Resultat::ERREUR);
      $this->resultat->setExplicationErreur($e->getMessage());
      return;
    }

    if ($res === Resultat::REUSSITE)
    {
      $this->resultat = new Resultat($res);
    }
    elseif ($res === Resultat::ECHEC || $res === Resultat::MANUEL)
    {
      $this->resultat = new Resultat($res);
      $this->resultat->setComplements($implementation->getComplements());
    }
    else
    {
      $this->resultat = new Resultat(Resultat::ERREUR);
      $this->resultat->setExplicationErreur('L\'implémentation a renvoyé un code'.
                                            ' résultat inconnu');
      return;
    }
  }

  /**
   * Accesseur de la variable $resultat
   *
   */
  public function getResultat()
  {
    return $this->resultat;
  }

  public function setResultat(Resultat $resultat)
  {
    $this->resultat = $resultat;
  }

  /**
   * Méthode de rendu pour label de formulaire
   */
  public function getLongName()
  {
    return (string) $this->getNom().', '.$this->getDescription();
  }

  /**
   * (non-PHPdoc)
   * @see record/sfDoctrineRecord::__toString()
   */
  public function __toString()
  {
    return (string) $this->getNom();
  }

  /**
   * Créée la liste des dépendances à exécuter avant de pouvoir exécuter ce
   * test
   *
   * @return La liste des dépendance à exécuter pour ce test
   */
  public function getExecutionList()
  {
    $executeList = array();
    if ($this->Dependance != null)
    {
      $executeList[] = $this->Dependance->getExecutionList();
    }
    $executeList[] = $this;

    return $executeList;
  }
}
