<?php
declare(strict_types=1);
namespace In2code\Personregister\Controller;

use In2code\Personregister\Domain\Model\Person;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class PersonController
 */
class PersonController extends ActionController
{
    /**
     * @return void
     */
    public function listAction(): void
    {
        $this->view->assign('person', new Person());
    }

    /**
     * &tx_personregister_pi1[action]=detail&tx_personregister_pi1[controller]=Person&cHash=56b8cc649571aa4843b69e7a9dc35478
     * &tx_personregister_pi1[action]=detail
     * @return void
     */
    public function detailAction(): void
    {
    }
}
