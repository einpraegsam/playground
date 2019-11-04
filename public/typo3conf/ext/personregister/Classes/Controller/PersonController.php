<?php
declare(strict_types=1);
namespace In2code\Personregister\Controller;

use In2code\Personregister\Domain\Model\Person;
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
     * @param Person $person
     * @return void
     */
    public function detailAction(Person $person): void
    {
        $this->view->assign('person', $person);
    }
}
