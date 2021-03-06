<?php use_helper('Partial');
      use_helper('Ihm');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="/kcatoesOutput/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="/kcatoesOutput/css/rich.css"/>
    <script type="text/javascript" src="/kcatoesOutput/js/jquery-1.7.1-min.js"></script>
    <script type="text/javascript" src="/kcatoesOutput/js/rich.js"></script>
  </head>
  <body>
  
		<?php if ($history): ?>
		  <form method="post" action="<?php echo url_for('evaluationSauvegarde', $extraction) ?>" >
		<?php endif; ?>
    
    <h1 id="rapportTitle">
      <img alt="" src="/kcatoesOutput/img/kcatoes.png"/>
      <?php echo $title ?>
      <?php echo $subtitle ?>
      <!-- <span class="score">Score&nbsp;<span class="scoreValue"><?php echo $score ?></span>%</span>  -->
      <?php if ($history): ?>
			    <span class="save">
			      <input type="submit" value="Sauvegarder" />
			      <input type="hidden" id="filename" name="filename" value="output.html" />
			      <input type="hidden" id="score" name="score" readonly="readonly" value="'.$this->getScore().'"/>
			    </span>
			<?php endif; ?>
      
      <?php if ($sf_user->hasFlash('success')): ?>
        <?php echo userMsg($sf_user->getFlash('success') , 'success', 'span', array('class' => 'saveMessage'));?>
      <?php endif; ?>
      <?php if ($sf_user->hasFlash('error')): ?>
        <?php echo userMsg($sf_user->getFlash('error') , 'error', 'span', array('class' => 'saveMessage'));?>
      <?php endif; ?>
    </h1>

    <div id="rapportFilter">
      <fieldset>
        <legend>Filtres</legend>
        
        <?php foreach($filters as $fKey => $filter): ?>
          <?php $field = $fKey.'Filter' ?>
          <label for="<?php echo $field ?>"><?php echo $filter['label'] ?> : </label>
          <select name="<?php echo $field ?>" id="<?php echo $field ?>">
            <?php foreach($filter['choices'] as $value => $label):?>
              <?php $selected = ($value == $filter['value']) ? ' selected="SELECTED"' : '' ?>
              <option value="<?php echo $value ?>" <?php echo $selected ?>><?php echo $label ?></option>
            <?php endforeach; ?>
          </select>
        <?php endforeach; ?>
        
        <input type="submit" name="filter" id="filterButton" value="Sauvegarder et filtrer" />
      </fieldset>
    </div>
    
    <div id="output">
      <div class="inner">
        <?php include_partial('testsResults', array('extraction' => $extraction,
                                                    'results'    => $results,
                                                    'history'    => $history,
                                                    'userTests'  => $userTests )) ?>
      </div>
    </div>
    <div id="resizeHandler"></div>
    <div id="tested">
      <div class="inner">
        <iframe src="<?php echo url_for('pageSource', $extraction) ?>" name="testedPage"></iframe>
       </div>
    </div>
	<?php if ($history): ?>
	  </form>
	<?php endif ?>
  </body>
</html>  