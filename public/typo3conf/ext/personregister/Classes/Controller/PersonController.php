<?php
declare(strict_types=1);
namespace In2code\Personregister\Controller;

use In2code\Personregister\Domain\Model\Dto\Filter;
use In2code\Personregister\Domain\Repository\InscriptionRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;

/**
 * Class PersonController
 */
class PersonController extends ActionController
{
    /**
     * @var InscriptionRepository
     */
    protected $inscriptionRepository = null;

    /**
     * @param Filter $filter
     * @return void
     * @throws InvalidQueryException
     */
    public function listAction(Filter $filter = null): void
    {
    }

    /**
     * @param int $inscription
     * @return void
     */
    public function detailAction(int $inscription): void
    {
        $this->view->assign('inscription', $this->inscriptionRepository->findByUid($inscription));
    }

    /**
     * @param InscriptionRepository $inscriptionRepository
     * @return void
     */
    public function injectInscriptionRepository(InscriptionRepository $inscriptionRepository)
    {
        $this->inscriptionRepository = $inscriptionRepository;
    }
}
