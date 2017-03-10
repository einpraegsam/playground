<?php
namespace Ukn\Person\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

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

}
