<?php
declare(strict_types=1);
namespace In2code\Person\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * PersonController
 */
class PersonController extends ActionController
{
    /**
     * @var \In2code\Person\Domain\Repository\PersonRepository
     * @inject
     */
    protected $personRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $persons = $this->personRepository->findAll();
        $this->view->assign('persons', $persons);
    }
}
