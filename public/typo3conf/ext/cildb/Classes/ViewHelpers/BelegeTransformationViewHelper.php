<?php
/**
 * Created by PhpStorm.
 * User: che
 * Date: 21.03.2019
 * Time: 10:42
 */


namespace BBAW\Cildb\ViewHelpers;


class BelegeTransformationViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    public function initializeArguments()
    {
        $this->registerArgument('belege', 'string', 'a set of ids for an inscription', FALSE);
    }

    public function render()
    {
        $belege = ($this->arguments['belege']);

		$beleg = explode('#', $belege);
		
		$inschrift = "";
		$br_level = 0;
                                
		foreach ($beleg as &$cell) {


            $subcell = explode('-', $cell);


            if ($subcell[2] > $br_level) {
                $br_level++;
                $inschrift .= " (";
            } else if ($subcell[2] < $br_level) {
                $br_level--;
                $inschrift .= ")";
            }

            //$inschrift.='-'.$subcell[0];
            if (($subcell[2] != "Leitbeleg")
                && ($subcell[2] != "status")) {
                $inschrift .= " " . $subcell[2] . " ";
            }
            
            //echo "Sammlung: ".$subcell[1]."<br />";
            
            if ($subcell[1] == "10") {
                $inschrift.=str_replace("I2","I<sup>2</sup>",$subcell[0]);
            } else if ($subcell[1] == "149") {
                $inschrift.=str_replace("IKöln2","IKöln<sup>2</sup>",$subcell[0]);
            } else {
                $inschrift .= $subcell[0];
            }


        }

                
                if ($br_level != 0) {
                    
                    $inschrift .= ")";
                    
                }

		
	$inschrift = trim($inschrift);
        return $inschrift;
    }

}
