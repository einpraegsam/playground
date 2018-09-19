<?php
namespace In2code\Person\Controller;

/***
 *
 * This file is part of the "Personlisting" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Alex Kellner <alexander.kellner@in2code.de>, In2code GmbH
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
