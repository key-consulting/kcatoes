<h1>Modifier la page &nbsp;: <strong><?php echo $page->getNom()?></strong></h1>
    <form method="post" action="<?php echo url_for('scenarioPageEdit', array('id'=>$page->getId()))?>" class="highlight">
      <h2>Modification d'une page</h2>
      <div>
        <div class="fields">
          <?php if ($editPageForm->hasGlobalErrors()):?>
          <div>
            <?php $editPageForm->renderGlobalErrors() ?>
          </div>
          <?php endif ?>
          <div>
            <?php echo $editPageForm->renderHiddenFields()?>
          </div>
          <div>
            <?php echo $editPageForm['nom']->renderError()?>
            <?php echo $editPageForm['nom']->renderLabel()?>&nbsp;:
            <?php echo $editPageForm['nom']->render()?>
          </div>
          <div>
            <?php echo $editPageForm['required']->renderError()?>
            <?php echo $editPageForm['required']->renderLabel()?>&nbsp;:
            <?php echo $editPageForm['required']->render()?>
          </div>
          <div>
            <?php echo $editPageForm['web_page_id']->renderError()?>
            <?php echo $editPageForm['web_page_id']->renderLabel()?>&nbsp;:
            <?php echo $editPageForm['web_page_id']->render()?>
          </div>
        </div>
        <div class="submit">
          <input type="submit" value="Modifier"/>
        </div>
      </div>
    </form>