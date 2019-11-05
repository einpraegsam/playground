<?php
declare(strict_types=1);
namespace In2code\Personregister\Controller;

use In2code\Personregister\Domain\Model\Dto\Filter;
use In2code\Personregister\Domain\Model\Person;
use In2code\Personregister\Domain\Repository\PersonRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;

/**
 * Class PersonController
 */
class PersonController extends ActionController
{
    /**
     * @param Filter $filter
     * @return void
     * @throws InvalidQueryException
     */
    public function listAction(Filter $filter = null): void
    {
        $personRepository = $this->objectManager->get(PersonRepository::class);
        $persons = $personRepository->findByFilter($filter);
        $this->view->assignMultiple([
            'persons' => $persons,
            'filter' => $filter
        ]);
    }

    /**
     * @param Person $person
     * @return void
     */
    public function detailAction(Person $person): void
    {
        $this->view->assign('person', $person);
    }

    /**
     * @return void
     * @throws \ErrorException
     */
    public function initializeJsonListAction(): void
    {
//        if ($authenticationService->isAuthenticated() === false) {
//            throw new \ErrorException('You are not allowed to see this view', 1572957189);
//        }
        try {
            $filterArgument = $this->arguments->getArgument('filter');
            $filterPropMapping = $filterArgument->getPropertyMappingConfiguration();
            $filterPropMapping->allowAllProperties();
        } catch (\Exception $exception) {
            // no filter
        }
    }

    /**
     * &tx_personregister_pi1[action]=jsonList
     *
     * @param Filter|null $filter
     * @return string
     * @throws InvalidQueryException
     */
    public function jsonListAction(Filter $filter = null): string
    {
        $personRepository = $this->objectManager->get(PersonRepository::class);
        $persons = $personRepository->findByFilterArray($filter);
        return json_encode($persons);
    }
}
