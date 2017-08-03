<?php
namespace Group\Person\Controller;

use Group\Person\Domain\Model\Person;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * PersonController
 */
class PersonController extends ActionController
{
    /**
     * @var \Group\Person\Domain\Repository\PersonRepository
     * @inject
     */
    protected $personRepository = null;

    /**
     * @return void
     */
    public function listAction()
    {
        $persons = $this->personRepository->findAll();
        $this->view->assign('persons', $persons);
    }

    /**
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
}
