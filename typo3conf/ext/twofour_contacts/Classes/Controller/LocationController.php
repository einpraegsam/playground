<?php
namespace Twofour\TwofourContacts\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class LocationController
 */
class LocationController extends ActionController
{
    /**
     * @var \Twofour\TwofourContacts\Domain\Repository\LocationRepository
     * @inject
     */
    protected $locationRepository = null;

    /**
     * @return string
     */
    public function listAction(): string
    {
        $locations = $this->locationRepository->findAll();
        $this->view->assignMultiple([
            'locations' => $locations,
        ]);
        return '';
    }
}
