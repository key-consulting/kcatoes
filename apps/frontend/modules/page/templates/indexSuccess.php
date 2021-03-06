<div class="block">
  <h1>Pages web</h1>
    <span>Ajout d'une page web</span>
    <form method="post" id="addPageForm" action="<?php echo url_for('page/index')?>" class="block <?php echo !$addPageForm->hasErrors()?'quickAddForm':'' ?>">
	    <h2>Ajout d'une page web</h2>
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
            <?php echo $addPageForm['url']->renderError()?>
            <?php echo $addPageForm['url']->renderLabel()?>
            <?php echo $addPageForm['url']->render()?>
          </div>
          <div>
            <?php echo $addPageForm['src']->renderError()?>
            <?php echo $addPageForm['src']->renderLabel()?>
            <?php echo $addPageForm['src']->render()?>
          </div>
          <div>
            <?php echo $addPageForm['description']->renderError()?>
            <?php echo $addPageForm['description']->renderLabel()?>
            <?php echo $addPageForm['description']->render()?>
          </div>
	        <div class="submit">
	          <input type="submit" value="Ajouter"/>
	        </div>
        </div>
      </div>
    </form>
    
    <?php $nbPage = count($pages)?>
    <?php if($nbPage == 0):?>
      <p class="zeroFound">
        Aucune page trouvée
      </p>
    <?php else: ?>
    <table summary="Liste des pages web et des informations d'évaluation associées">
      <caption>Liste des pages web</caption>
      <thead>
        <tr>
          <th scope="col"><abbr lang="en" title="Unified Ressource Locator">URL</abbr></th>
          <th scope="col">Description</th>
          <th scope="col">Extractions</th>
          <th scope="col">Tests</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($pages as $page):?>
        <tr>
          <td><?php echo $page->getUrl()?></td>
          <td><?php echo $page->getDescription()?></td>
          <td><?php echo count($page->getCollectionExtracts())?></td>
          <td><?php echo count($page->getCollectionTests())?></td>
          <td>
              <?php echo link_to('Modifier', 'pageEdit'
                                  ,array('id'=>$page->getId())
                                  ,array('class'=> 'ico modifier popupScreen'
                                        ,'title'=> 'Modifier les informations de la page '.$page['url'])) 
               ?>
              <?php echo link_to('Détails', 'pageDetail'
                                  ,array('id'=>$page->getId())
                                  ,array('class'=> 'ico detail'
                                        ,'title'=> 'Voir les détails de la page '.$page['url'])) 
               ?>


	            <?php echo link_to('Supprimer', 'pageDelete'
	                                ,array('id'=>$page->getId())
	                                ,array('class'=> 'ico supprimer'
	                                      ,'title'=> 'Supprimer la page '.$page['url']
	                                      ,'confirm'=>'Êtes-vous sûr ?')) 
	             ?>
          </td>
        </tr>
      <?php endforeach ?>  
      </tbody>
    </table>
    <?php endif ?>
  </div>