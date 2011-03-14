<?php

/**
 * Vérifie, quand elle est présente, la conformité de la syntaxe de la déclaration
 * !DOCTYPE par rapport aux syntaxes validées par le W3C
 *
 * @author Adrien Couet
 *
 */
class ConformiteSyntaxiqueDeLaDeclarationDUtilisationDUneDtd extends ASource
{
  public function __construct()
  {
    $this->explication = 'La déclaration de DOCTYPE n\'a pas été faite selon une syntaxe validée par le W3C';
  }

  public function execute(Page $page)
  {
    $url = $page->url;
    $lines = file($url);
    $i = 0;
    $foundDoctype = false;

    while ($i < count($lines) && !$foundDoctype)
    {
      if (preg_match('#<!DOCTYPE.*#', $lines[$i]))
      {
        $doctype = preg_replace('#\s#', ' ', $lines[$i]);
        $foundDoctype = true;
      }
      $i++;
    }

    if (!$foundDoctype)
    {
      $this->explication = 'Aucune déclaration de DOCTYPE n\'est présente dans la page';
      return false;
    }
    $knownDoctypes = array('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">',
                           '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
                           '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">',
                           '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
                           '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
                           '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">',
                           '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">',
                           '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">');
    return (array_search($doctype, $knownDoctypes) >= 0)? true:false;
  }
}