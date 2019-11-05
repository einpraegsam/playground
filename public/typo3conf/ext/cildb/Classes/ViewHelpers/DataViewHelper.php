<?php
namespace Cildb\Bbaw_cildb\Domain\Model;/**
 * Created by PhpStorm.
 * User: che
 * Date: 05.02.2019
 * Time: 11:09
 */

class DataViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    public function render(){

        $services = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::findService('connector', 'sql');
        if ($services === false) {
            // Issue an error
        } else {
            $connector = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstanceService('connector', 'sql');
        }
        $connectionParams =[
            'driver' => 'pdo_mysql',
            'server' => 'datapack.bbaw.de',
            'user' => 'cil',
            'password' => 'cicero20',

            'database' => 'cil_fm',
            //'query' =>'SELECT antik FROM fundort WHERE(antik IS NOT NULL)AND(antik !="?");'
            //'query' =>'SELECT modern FROM fundort WHERE(modern IS NOT NULL)AND(modern !="?");'
            'query' =>'SELECT name FROM provinz WHERE name !="?";'
            //'query' => 'SELECT antik FROM fundort WHERE (provinz_id=(SELECT id FROM provinz WHERE name = <EM.provinz>)) AND (antik IS NOT NULL)AND (antik !="?");'
        ];
        $dataresult = $connector->fetchArray($connectionParams);

        $this->templateVariableContainer->add('data',$dataresult);
        $output = $this->renderChildren();
        $this->templateVariableContainer->remove('data');
        return $output;
    }
}