<?php
namespace Group\Person\Controller;

use Group\Person\Domain\Model\Dto\FilterDto;
use Group\Person\Domain\Model\Person;
use TYPO3\CMS\Core\Utility\GeneralUtility;
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
    public function initializeListAction()
    {
        try {
            $filter = $this->request->getArgument('filter');
            $filter = GeneralUtility::makeInstance(FilterDto::class, $this->settings, $filter);
            $this->request->setArgument('filter', $filter);
        } catch (\Exception $exception) {
        }
    }

    /**
     * @param FilterDto $filter
     * @return void
     */
    public function listAction(FilterDto $filter = null)
    {
        $persons = $this->personRepository->findByFilter($filter);
        $this->view->assignMultiple([
            'persons' => $persons,
            'filter' => $filter
        ]);
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

    /**
     * @return void
     */
    public function myAction()
    {
        $persons = $this->personRepository->findAll();
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($persons, 'in2code: ' . __CLASS__ . ':' . __LINE__);
    }

    /**
     * @param Person $person
     * @return string
     */
    public function exampleJsonAction(Person $person): string
    {
        return json_encode($person->_getProperties());
    }
}
