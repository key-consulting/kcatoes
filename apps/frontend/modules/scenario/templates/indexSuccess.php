  <div class="block" id="scenarioIndex">
    <h1>Scenarios</h1>
  <?php if ($sf_user->hasCredential('gestion scenario')):?>
  <span>Ajout d'un scénario de page web</span>
  <form method="post" id="addScenarioForm" action="<?php echo url_for('scenario/index')?>" class="block <?php echo !$addScenarioForm->hasErrors()?'quickAddForm':'' ?>">
      <h2>Ajout d'un scenario de page web</h2>
      <div>
        <div class="fields">
          <?php if ($addScenarioForm->hasGlobalErrors()):?>
          <div>
            <?php $addScenarioForm->renderGlobalErrors() ?>
          </div>
          <?php endif ?>
          <div>
            <?php echo $addScenarioForm->renderHiddenFields()?>
            <?php echo $addScenarioForm['nom']->renderError()?>
            <?php echo $addScenarioForm['nom']->renderLabel()?>
            <?php echo $addScenarioForm['nom']->render()?>
          </div>
          <div>
            <?php echo $addScenarioForm['template']->renderError()?>
            <?php echo $addScenarioForm['template']->renderLabel()?>
            <?php echo $addScenarioForm['template']->render()?>
          </div>
          <div class="submit">
            <input type="submit" value="Ajouter"/>
          </div>
        </div>
      </div>
    </form>
    <?php endif ?>


    <?php $nbScenarios = count($scenarios)?>
    <?php if($nbScenarios == 0):?>
      <p class="zeroFound">
        Aucun scénario trouvé
      </p>
    <?php else: ?>
    <ul class="listItem" id="scenarioList">
      <?php foreach($scenarios as $scenario):?>
        <li class="highlight">
          <h2>
            <span class="nom"><?php echo $scenario->getNom()?></span>
            &mdash; <?php echo count($scenario->getScenarioPages())?> page(s)
          </h2>
          <?php echo link_to('Détails', 'scenarioDetail'
                              ,array('id'=>$scenario->getId())
                              ,array('class'=> 'ico detail'
                                    ,'title'=> 'Voir le détails du scénario '.$scenario['nom'])) 
           ?>
           <?php if ($sf_user->hasCredential('gestion scenario')):?>
	          <?php echo link_to('Modifier', 'scenarioEdit'
	                              ,array('id'=>$scenario->getId())
	                              ,array('class'=> 'ico modifier popupScreen'
	                                    ,'title'=> 'Modifier les informations du scénario '.$scenario['nom'])) 
	          ?>
	          <?php echo link_to('Supprimer', 'scenarioDelete'
	                              ,array('id'=>$scenario->getId())
	                              ,array('class'=> 'ico supprimer'
	                                    ,'title'=> 'Supprimer le scénario '.$scenario['nom']
	                                    ,'confirm'=>'Êtes-vous sûr ?\n Cela supprimera les types de pages du scénario mais pas les pages web associées')) 
	           ?>
	         <?php endif ?>
        </li>
    <?php endforeach ?>
    </ul>
    <?php endif ?>
  </div>