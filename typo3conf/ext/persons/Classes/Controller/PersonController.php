<?php
namespace In2code\Persons\Controller;

/***
 *
 * This file is part of the "Personlist" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Alex Kellner <alexander.kellner@in2code.de>, in2code
 *
 ***/

/**
 * PersonController
 */
class PersonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * personRepository
     *
     * @var \In2code\Persons\Domain\Repository\PersonRepository
     * @inject
     */
    protected $personRepository = null;

    /**
     * @param array $filter
     * @return void
     */
    public function listAction(array $filter = [])
    {
        $persons = $this->personRepository->findByFilter($filter);
        $this->view->assignMultiple([
            'persons' => $persons,
            'filter' => $filter
        ]);
    }
}
