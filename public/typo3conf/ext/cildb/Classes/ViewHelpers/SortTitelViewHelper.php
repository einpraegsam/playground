<?php
/**
 * Created by PhpStorm.
 * User: che
 * Date: 20.08.2019
 * Time: 10:59
 */

namespace BBAW\Cildb\ViewHelpers;


class SortTitelViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    public function initializeArguments()
    {
        $this->registerArgument('data_kurztitel', 'string', 'title of the data', FALSE);
    }

    public function render()
    {
        $datatitel = ($this->arguments['data_kurztitel']);

        $gerate_html=" <ul class=\"list-unstyled\">";
        foreach ($datatitel as & $data) {

            if($data!= null){

            }





        }


    }
}