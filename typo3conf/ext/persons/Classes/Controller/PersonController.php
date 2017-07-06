<?php
namespace In2code\Persons\Controller;

use In2code\Persons\Domain\Model\Person;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/***
 *
 * This file is part of the "Personlist" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Alex Kellner <alexander.kellner@in2code.de>, in2code
 *
 ***/

/**
 * PersonController
 */
class PersonController extends ActionController
{
    /**
     * @var \In2code\Persons\Domain\Repository\PersonRepository
     * @inject
     */
    protected $personRepository = null;
    /**
     * @var \In2code\Persons\Domain\Repository\ProgramRepository
     * @inject
     */
    protected $programRepository = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     * @inject
     */
    protected $persistenceManager;

    /**
     * @param array $filter
     * @return void
     */
    public function listAction(array $filter = [])
    {
        $persons = $this->personRepository->findByFilter($filter);
        $this->view->assignMultiple([
            'persons' => $persons,
            'filter' => $filter
        ]);
    }

    /**
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * @param Person $person
     * @return void
     */
    public function createAction(Person $person)
    {
        $this->personRepository->add($person);
        $this->persistenceManager->persistAll();
        $this->addFlashMessage('danke, ist angelegt');
        $this->redirect('list');
    }

    /**
     * @param Person $person
     * @return void
     */
    public function editAction(Person $person)
    {
        $programs = $this->programRepository->findEverything();
        $this->view->assignMultiple([
            'person' => $person,
            'programs' => $programs
        ]);
    }

    /**
     * @param Person $person
     * @return void
     */
    public function updateAction(Person $person)
    {
        $this->personRepository->update($person);
        $this->addFlashMessage('danke, ist geändert');
        $this->redirect('list');
    }
}
