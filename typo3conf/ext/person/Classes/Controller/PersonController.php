<?php
namespace Ukn\Person\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
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
     * @return void
     */
    public function listAction()
    {
        $persons = $this->personRepository->findAll();
        $this->view->assign('persons', $persons);
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
}
