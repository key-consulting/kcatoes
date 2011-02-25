<?php

/**
 * Test
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    kcatoes
 * @subpackage model
 * @author     Adrien Couet
 */
class Test extends BaseTest
{

	/**
	 *
	 * Récupération du nom court à partir du nom pour éxécution du test correspondant....
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
}
