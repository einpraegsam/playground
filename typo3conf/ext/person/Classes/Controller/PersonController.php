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
     * @param array $filter
     * @return void
     */
    public function listAction(array $filter = [])
    {
        $filter = $this->addFilterSearchtermFromFlexForm($filter);
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
     * @param array $filter
     * @return array
     */
    protected function addFilterSearchtermFromFlexForm(array $filter): array
    {
        if ($filter === [] && !empty($this->settings['searchterm'])) {
            $filter['searchterm'] = $this->settings['searchterm'];
        }
        return $filter;
    }
}
