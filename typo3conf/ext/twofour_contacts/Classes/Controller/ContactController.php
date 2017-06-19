<?php
namespace Twofour\TwofourContacts\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * ContactController
 */
class ContactController extends ActionController
{
    /**
     * contactRepository
     *
     * @var \Twofour\TwofourContacts\Domain\Repository\ContactRepository
     * @inject
     */
    protected $contactRepository = null;

    /**
     * @return void
     */
    public function listAction()
    {
        $contacts = $this->contactRepository->findAll();
        $this->view->assign('contacts', $contacts);
    }
}
