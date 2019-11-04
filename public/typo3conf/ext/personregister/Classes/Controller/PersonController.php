<?php
declare(strict_types=1);
namespace In2code\Personregister\Controller;

use In2code\Personregister\Domain\Repository\PersonRepository;
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
        $personRepository = $this->objectManager->get(PersonRepository::class);
        $persons = $personRepository->findAll();
        $this->view->assign('persons', $persons);
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
