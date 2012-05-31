<?php use_helper('Ihm')?>
<h1>Scenario&nbsp;: <strong><?php echo $scenario->getNom()?></strong></h1>
    <form method="post" action="<?php echo url_for('scenarioDetail', array('id'=>$scenario->getId()))?>" class="highlight <?php echo !$addPageForm->hasErrors()?'quickAddForm':'' ?>">
      <h2>Ajout d'un type de page</h2>
      <div>
        <div class="fields">
          <?php if ($addPageForm->hasGlobalErrors()):?>
          <div>
            <?php $addPageForm->renderGlobalErrors() ?>
          </div>
          <?php endif ?>
          <div>
            <?php echo $addPageForm->renderHiddenFields()?>
          </div>
          <div>
            <?php echo $addPageForm['nom']->renderError()?>
            <?php echo $addPageForm['nom']->renderLabel()?>
            <?php echo $addPageForm['nom']->render()?>
          </div>
          <div>
            <?php echo $addPageForm['required']->renderError()?>
            <?php echo $addPageForm['required']->renderLabel()?>
            <?php echo $addPageForm['required']->render()?>
          </div>
          <div>
            <?php echo $addPageForm['web_page_id']->renderError()?>
            <?php echo $addPageForm['web_page_id']->renderLabel()?>
            <?php echo $addPageForm['web_page_id']->render()?>
          </div>
        </div>
        <div class="submit">
          <input type="submit" value="Ajouter"/>
        </div>
      </div>
    </form>
<div>
  <?php $nbPages = count($pages) ?>
  <?php if ($nbPages == 0): ?>
      <p class="zeroFound">
        Aucune page trouvée
      </p>
  <?php else:?>

  <form method="post" action="<?php echo url_for('scenarioDetail', array('id'=>$scenario->getId()))?>">
    <div>
      <input type="hidden" name="templateId" value="<?php echo $scenario->getId() ?>"/>
      <?php echo $setAsTemplateForm['nom']->renderError()?>
      <?php echo $setAsTemplateForm['nom']->renderLabel()?>
      <?php echo $setAsTemplateForm['nom']->render()?>
    </div>
    <div class="submit">
      <input type="submit" value="Définir un modèle à partir de ce scénario"/>
    </div>
  </form>

  <h2>Pages du scenario</h2>

  <?php if ($sf_user->hasFlash('testsMsg')): ?>
    <?php echo userMsg($sf_user->getFlash('testsMsg'), 'success') ?> 
  <?php endif; ?>
  
  <form method="post" action="<?php echo url_for('scenarioActions', array('id'=>$scenario->getId()))?>">
    <ul class="scenarioPages highlight">
    <?php foreach($pages as $page): ?>
      <?php 
        $hasWebpage = count($page->getWebPage())>0;
      ?>
      <li>
        <div class="headPage">
	        <h3>
	          <?php if ($page->getRequired()):?>
	            <?php echo image_tag('/img/ico/asterisk_orange.png',array(
	                    'title' => 'Page obligatoire'
	                    ,'alt' => 'Obligatoire'
	                    ,'class' => 'required')) ?>
	          <?php endif ?>
	          <?php echo $page->getNom() ?>
	        </h3>
	        <div class="actions">
	           <?php echo link_to('Modifier', 'scenarioPageEdit'
	                           ,array('id'=>$page->getId())
	                           ,array('class'=> 'ico modifier'
	                           ,'title'=> 'Modifier la page '.$page->getNom())) 
	            ?>
	            <?php echo link_to('Supprimer', 'scenarioPageDelete'
	                           ,array('id'=>$page->getId(), 'scenarioId'=>$scenario->getId())
	                           ,array('class'=> 'ico supprimer'
	                           ,'title'=> 'Supprimer le type de page '.$page->getNom())) 
	            ?>
	        </div>
        </div>
        <?php if ($hasWebpage):?>
        <div class="twoParts">
        
	        <div class="summaryPage part smallpart">
	          <div class="url"><?php echo $page->getWebPage()->getUrl() ?></div>
	          <div class="description"><?php echo $page->getWebPage()->getDescription() ?></div>
	        </div>
	        
	        <?php $extracts = $page->getWebPage()->getCollectionExtracts()?>
	        <?php if (count($extracts)>0):?>
	          <div class="scenarioPageExtractList part bigpart">
	            <div class="actions">
		            <?php echo link_to('Gérer les extractions', 'pageExtracts'
		                              ,array('id'=>$page->getWebPage()->getId())
		                              ,array('class'=> 'ico extraire'
		                                    ,'title'=> 'Gérer les extractions de la page '.$page->getWebPage()->getUrl())) 
		            ?>
		          </div>
	            <ul>
	            <?php foreach ($extracts as $extract):?>
	              <?php
	                $testPassed = count($extract->getCollectionResults());
	              ?>
	               <li class="extract <?php echo $testPassed?'':'nbTest0'?>">
	                  <input type="checkbox" name="extracts[]" id="extr_<?php echo $extract->getId()?>" checked="checked" value="<?php echo $extract->getId()?>"/>
	                  <label for="extr_<?php echo $extract->getId()?>">
	                    <span class="type"><?php echo $extract->getType()?></span>
	                    &ndash;
	                    <span class="nbTest"><?php echo $testPassed ?> test(s) passé(s)</span>
	                  </label>
	                  <?php echo link_to('Voir les résultats (riche)', 'pageResultatTestsRiche', 
                              array('id' => $extract->getId()), 
                              array('popup'=>true)) ?>
	               </li>
	             <?php endforeach ?>
	             </ul>
	           </div>
	          <?php endif ?>
          </div>
        <?php else: ?>
          <?php if ($page->getRequired()):?>
            <?php echo userMsg('Aucune page associée. Celle-ci est obligatoire', 'warning')?>
          <?php else: ?>
            <p>Aucune page associée</p>
          <?php endif;?>
        <?php endif ?>
      </li>
    <?php endforeach ?>
    </ul>
    <h2>Actions sur le scenario</h2>
	  <?php echo userMsg('Les actions ci-dessous seront faites sur les extractions sélectionnées.', 'info')?>
	  <div class="submit">
	    <button type="submit" name="scenarioAction" value="rapport_detaille">Rapport détaillé</button>
	    <button type="submit" name="scenarioAction" value="rapport_simple">Rapport simple</button>
	    <button type="submit" name="scenarioAction" value="execute_test">Lancer les tests</button>
	  </div>
  </form>
  <?php endif ?>
</div>
<a href="<?php echo url_for('scenarioIndex')?>">Liste des scenarii</a>