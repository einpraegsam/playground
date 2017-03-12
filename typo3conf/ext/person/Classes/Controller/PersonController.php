<?php
namespace Ukn\Person\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Ukn\Person\Domain\Model\Person;

/**
 * Class PersonController
 */
class PersonController extends ActionController
{
    /**
     * @var array
     */
    protected $authenticatedActions = [
        'createAction',
        'updateAction',
        'editAction'
    ];

    /**
     * @var \Ukn\Person\Domain\Repository\PersonRepository
     * @inject
     */
    protected $personRepository = null;

    /**
     * @return void
     * @throws \Exception
     */
    public function initializeAction()
    {
        if ($this->isAutenticatAction() && !$this->isAllowed()) {
            throw new \Exception('Bad Guy!');
        }
    }

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

    /**
     * &tx_person_pi1[autocomplete]=Ale
     *
     * @param string $autocomplete
     * @return string
     */
    public function ajaxAction(string $autocomplete)
    {
        return json_encode($this->personRepository->findForAjax($autocomplete));
    }

    /**
     * Check if frontend user is logged in with fe_groups.uid=1
     *
     * @return bool
     */
    protected function isAllowed(): bool
    {
        $feGroupUids = GeneralUtility::intExplode(',', $GLOBALS['TSFE']->fe_user->user['usergroup'], true);
        return in_array(1, $feGroupUids);
    }

    /**
     * @return bool
     */
    protected function isAutenticatAction(): bool
    {
        return in_array($this->actionMethodName, $this->authenticatedActions);
    }
}
