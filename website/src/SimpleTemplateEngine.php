<?php

namespace dany;

class SimpleTemplateEngine 
{

  private $templatePath;
  public function __construct($templatePath) 
  {
    $this->templatePath = $templatePath;
  }
  public function render($template, array $arguments = []) 
  {
    extract($arguments);
    ob_start();
    require($this->templatePath.$template);
    return ob_get_clean();
  }
}
