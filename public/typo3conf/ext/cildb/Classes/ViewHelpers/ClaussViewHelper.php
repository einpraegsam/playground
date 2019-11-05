<?php

/* 
 * Author: Nora
 * 28.03.2019
 */

namespace BBAW\Cildb\ViewHelpers;

class ClaussViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    
    public function initializeArguments()
    {
        $this->registerArgument('clauss','string','clauss database id', FALSE);
    }
    
    public function render()
    {
        $clauss_id = ($this->arguments['clauss']);
        
        //echo "clauss: ".$clauss_id;
        
        $field = "";
        
        if (!($clauss_id == '')) {
            
            $field = "<form name=\"epi\" action=\"http://db.edcs.eu/epigr/epi_ergebnis.php\" method=\"POST\" target=\"_blank\">\n"
                    ."<input type=\"hidden\" name=\"p_edcs_id\" value=\"$clauss_id\">\n"
                    ."<input type=\"hidden\" name=\"s_sprache\" value=\"de\">\n"
                    ."<input type=\"hidden\" name=\"r_sortierung\" value=\"Provinz\">\n"
                    ."<b>Inschrifttext:</b> <input type=\"submit\" style=\"padding:0;background-color:transparent;border:0;color:#0171b0;cursor:pointer;font-family:inherit;font-size:inherit;\" value=\"EDCS\"> &#128279;\n"
                    ."</form>";
            
        }
        
        return $field;
    }
    
}

