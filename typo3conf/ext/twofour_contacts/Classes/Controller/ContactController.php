<?php
namespace Twofour\TwofourContacts\Controller;

use Twofour\TwofourContacts\Domain\Model\Contact;
use Twofour\TwofourContacts\Utility\UserUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * ContactController
 */
class ContactController extends ActionController
{
    /**
     * @var \Twofour\TwofourContacts\Domain\Repository\ContactRepository
     * @inject
     */
    protected $contactRepository = null;

    /**
     * @var \Twofour\TwofourContacts\Domain\Repository\SmallContactRepository
     * @inject
     */
    protected $smallContactRepository = null;

    /**
     * @param array $filter
     * @return void
     */
    public function listAction(array $filter = [])
    {
        $contacts = $this->smallContactRepository->findByFilter($filter);
        $this->view->assignMultiple([
            'contacts' => $contacts,
            'filter' => $filter
        ]);
    }

    /**
     * @return void
     */
    public function initializeDetailAction()
    {
        if (!UserUtility::isLoggedInFrontendUser()) {
            $this->forward('list');
        }
    }

    /**
     * @param Contact $contact
     * @return void
     */
    public function detailAction(Contact $contact)
    {
        $this->view->assign('contact', $contact);
    }

    /**
     * @param string $searchterm
     * @return string
     */
    public function ajaxSearchAction(string $searchterm): string
    {
        $contacts = $this->contactRepository->findLastNameBySearchterm($searchterm);
        return json_encode($contacts);
    }
}
