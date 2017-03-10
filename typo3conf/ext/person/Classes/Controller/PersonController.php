<?php
namespace Ukn\Person\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Ukn\Person\Domain\Model\Person;

/**
 * Class PersonController
 */
class PersonController extends ActionController
{

    /**
     * @var \Ukn\Person\Domain\Repository\PersonRepository
     * @inject
     */
    protected $personRepository = null;

    /**
     * @param array $filter
     * @return void
     */
    public function listAction(array $filter = [])
    {
        $persons = $this->personRepository->findByFilter($filter);
        $this->view->assign('persons', $persons);
        $this->view->assign('filter', $filter);
    }

    /**
     * &tx_person_pi1[controller]=Person
     * &tx_person_pi1[action]=detail
     * &tx_person_pi1[person]=1
     *
     * @param Person $person
     * @return void
     */
    public function detailAction(Person $person)
    {
        $this->view->assign('person', $person);
    }

    /**
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * &tx_person_pi1[person][firstName]
     * &tx_person_pi1[person][lastName]
     *
     * @param Person $person
     * @return void
     */
    public function createAction(Person $person)
    {
        $this->personRepository->add($person);
        $this->addFlashMessage('user successfully generated');
        $this->redirect('list');
    }

    /**
     * @param Person $person
     * @return void
     */
    public function editAction(Person $person)
    {
        $this->view->assign('person', $person);
    }

    /**
     * @param Person $person
     * @return void
     */
    public function updateAction(Person $person)
    {
        $this->personRepository->update($person);
        $this->addFlashMessage('user properties successfully changed');
        $this->redirect('list');
    }

    /**
     * Example action
     *
     * @return void
     */
    public function list2Action()
    {
    }
}
