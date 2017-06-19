<?php
namespace Twofour\TwofourContacts\Controller;

use Twofour\TwofourContacts\Domain\Model\Contact;
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

    /**
     * @param Contact $contact
     * @return void
     */
    public function detailAction(Contact $contact)
    {
        $this->view->assign('contact', $contact);
    }
}
