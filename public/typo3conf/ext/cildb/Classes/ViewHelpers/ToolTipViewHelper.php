<?php

/* 
 * Author: Nora
 * 24.04.2019
 */

namespace BBAW\Cildb\ViewHelpers;


class ToolTipViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     * Example for "belege":
     *  "IL 3232-10-Leitbeleg-0#F 3232-10-Leitbeleg-0"
     *
     * Exmple for "sammlungen":
     *  "10-IL-Inscriptiones Latinae#11-F-Foo#12-B-Bar"
     *
     * @return void
     */
    public function initializeArguments() {
        
        $this->registerArgument('belege', 'string', 'set of inscription ids', FALSE);
        $this->registerArgument('sammlungen', 'string', 'full collection titles', FALSE);
        
    }
    
    function getToolTip($dictionary, $s_id, $belegtext) {
        
        if ($s_id == 10) {
            return str_replace("I2","I<sup>2</sup>",$belegtext);
        }
        
        $entry = $dictionary[$s_id];
        
        //echo "Eintrag fuer $s_id: $entry[0] -> $entry[1]";
        //echo "beleg: ".$belegtext.", länge: ".strlen($belegtext);
        //echo "was abgeschnitten wird: ".$entry[0].", länge: ".strlen($entry[0]);
        //echo "was vom beleg übrig blieb: ".substr($belegtext,strlen($entry[0]))."<br />";
        
        $tooltip = "<a href=\"#\" data-toggle=\"tooltip\" title=\"\" data-original-title=\"$entry[1]\">"
                . "$entry[0]</a>".substr($belegtext,strlen($entry[0]));
        
        if ($s_id == 149) {
            $tooltip = str_replace("IKöln2", "IKöln<sup>2</sup>", $tooltip);
        }
        
        return $tooltip;
    }
    
    public function render() {
        
        $belege = explode('#',$this->arguments['belege']);
        $sammlungen = explode ('#',$this->arguments['sammlungen']);
        
        $dict = array();
        
        
        foreach ($sammlungen as &$sammlung) {
            
            $s_meta = explode('|',$sammlung);
            
            //echo "s_id: $s_meta[0]";
            
            $tip = array();
            
            //echo "abk: $s_meta[1]";
            
            if ($s_meta[0] == 11 | 12 | 13 | 14) {
                $s_meta[1] = str_replace("[CIL] ", "", $s_meta[1]);
            }
            
            $tip[] = $s_meta[1];
            
            if ($s_meta[3] == 'autor') {
                $tip[] = $s_meta[2];
            } else {
                $tip[] = $s_meta[3].": ".$s_meta[2];
            }
            
            //echo "tooltip: $tip[1] <br />";
            
            $dict[$s_meta[0]] = $tip;
            
        }
        
        
        
        $inschrift = "";
        
        
        foreach ($belege as &$beleg) {
            
            $data = explode('|',$beleg);
            $br_level = 0;
            
            //echo "Klammerlevel: $data[3]";
            if (data[3] > $br_level) {
                            $br_level++;
                            $inschrift .=" (";
                        } else if ($data[3]<$br_level) {
                            $br_level--;
                            $inschrift .=")";
                        }
                        
			//$inschrift.='-'.$subcell[0];
                        if (($data[2] != "Leitbeleg")
                                && ($data[2] != "status")) {
                            
                            $inschrift .=" ".$data[2]." ";
                        }
                        
                        $inschrift .= $this->getToolTip($dict, $data[1], $data[0]);
                        
        }
        
        if ($br_level != 0) {
                    
                    $inschrift .= ")";
                    
        }
        
        $inschrift = trim($inschrift);	
        
        return $inschrift;
                        
    }
    
    
}
