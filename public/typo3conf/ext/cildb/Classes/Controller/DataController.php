<?php
namespace BBAW\Cildb\Controller;
use BBAW\Cildb\Domain\Repository\InscriptionRepository;

/**
 * Class DataController
 */
class DataController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * @param array $filter
     * @return void
     */
    public function listAction(array $filter)
    {
        $inscriptionRepository = $this->objectManager(InscriptionRepository::class);
        $this->view->assign('data_name', $inscriptionRepository->findAllProvinces());
        $this->view->assign('data_antik', $inscriptionRepository->findAllProvinces());
        $this->view->assign('data_modern', $inscriptionRepository->findAllProvinces());
        $this->view->assign('data_search', $inscriptionRepository->findByFilter($filter));
        $this->view->assign('filter', $filter);
    }

    /**
     * // &tx_cildb_datalisting[filter][searchterm]=abc
     * @param array $filter
     * @return void
     */
    public function jsonListAction(array $filter)
    {
        $dataRepository = $this->objectManager(InscriptionRepository::class);
        $inscriptions = $dataRepository->findByFilter($filter);
        return json_encode($inscriptions);
    }

    /**
     * @param int $inscription
     * @return void
     */
    public function showAction(int $inscription): void
    {
        $dataRepository = $this->objectManager(InscriptionRepository::class);
        $this->view->assign('inscription', $dataRepository->findByUid($inscription));
        $collectionRepository = $this->objectManager(CollectionRepository::class);
        $this->view->assign('collections', $collectionRepository->findAll());
    }
}
