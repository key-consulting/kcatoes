<?php

class kcatoesInitprofilsTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'Le nom de l\'application', 'frontend'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'L\'environnement (dev|prod|..)', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'Le type de connexion (doctrine|propel)', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'kcatoes';
    $this->name             = 'init-profils';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
La tâche [kcatoes:init-profils|INFO] permet d'initialiser les associations test-profil
d'après le référentiel RGAA
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    // add your code here
    
    // Inclusion des classes de test
    TestsHelper::getRequired();
    
    // Récupération des profils existants
    $allProfils = sfGuardGroupTable::getInstance()->findAll();
    
    // Rangement des profils sous forme de hash
    $tabAllProfils = array();
    foreach($allProfils as $profil)
    {
      $tabAllProfils[$profil->getName()] = $profil;
      $profil->getCollectionTests()->delete();
    }

    // Récupération des tests existants
    $allTests   = TestsHelper::getAllTestsFromDir();
    
    // Parcours des tests    
    foreach($allTests as $test)
    {      
      $profils = $test::getGroup('profils');
      
      echo $test::testId . ' ' . $test::testName . "\n";
      foreach($profils as $profil)
      {
        echo "   profil : $profil\n";
        if (!isset($tabAllProfils[$profil]))
        {
          // Création du nouveau profil
          $tabAllProfils[$profil] = new sfGuardGroup();
          $tabAllProfils[$profil]->setName($profil);
          $tabAllProfils[$profil]->setDescription($profil);
          $tabAllProfils[$profil]->save();
          
          //TODO : une permission particulière ?
          //$tabAllProfils[$profil]->setPermissions();
        }
        
        // cRéation de l'association Profil / Test
        $profilTest = new ProfilTest();
        $profilTest->setClass($test);
        $profilTest->setSfGuardGroup($tabAllProfils[$profil]);
        $profilTest->save();
      }
      
    }
    
  }
}
