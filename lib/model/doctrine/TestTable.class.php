<?php

/**
 * TestTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 * @package    Kcatoes
 * @subpackage table
 * @author     Adrien Couet <adrien.couet@keyconsulting.fr>
 */
class TestTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object TestTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Test');
  }


  /**
   *
   * @param array $ids
   */
  public function getCollectionFromIds($ids)
  {
    return $this->createQuery('t')->whereIn('t.id', $ids)->execute();
  }
}