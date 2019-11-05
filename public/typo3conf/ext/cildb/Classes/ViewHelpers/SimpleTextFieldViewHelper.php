<?php

/* 
 * Author: Nora
 * 28.03.2019
 */

namespace BBAW\Cildb\ViewHelpers;

class SimpleTextFieldViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    
    public function initializeArguments()
    {
        $this->registerArgument('label', 'string', 'the label for the text field', FALSE);
        $this->registerArgument('content','string','the content of the text field', FALSE);
    }
    
    public function render()
    {
        $label = ($this->arguments['label']);
        $content = ($this->arguments['content']);
        
        $field = "";
        
        if (!($content == ""))
        {
            $field = "<strong>".$label.":</strong> ".$content;
        }
        
        return $field;
    }
    
}
