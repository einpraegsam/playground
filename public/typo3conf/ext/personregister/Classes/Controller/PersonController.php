<?php
declare(strict_types=1);
namespace In2code\Personregister\Controller;

use In2code\Personregister\Domain\Model\Person;
use In2code\Personregister\Domain\Repository\PersonRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;

/**
 * Class PersonController
 */
class PersonController extends ActionController
{
    /**
     * &tx_personregister_pi1[filter][searchterm]
     *
     * @return void
     * @throws InvalidQueryException
     */
    public function listAction(array $filter = []): void
    {
        $personRepository = $this->objectManager->get(PersonRepository::class);
        $persons = $personRepository->findByFilter($filter);
        $this->view->assign('persons', $persons);
        $this->view->assign('filter', $filter);
    }

    /**
     * @param Person $person
     * @return void
     */
    public function detailAction(Person $person): void
    {
        $this->view->assign('person', $person);
    }
}
