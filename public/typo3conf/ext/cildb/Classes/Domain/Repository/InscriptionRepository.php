<?php
namespace BBAW\Cildb\Domain\Repository;

use BBAW\Cildb\Domain\Model\Inscription;
use In2code\In2template\Utility\ObjectUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;

/**
 * Class DataRepository
 */
class InscriptionRepository
{
    /**
     * @var array
     */
    protected $connection = [
        'driver' => 'pdo_mysql',
        'server' => 'datapack.bbaw.de',
        'user' => 'cil',
        'password' => 'cicero20',
        'database' => 'cil_fm',
        'init' => "SET NAMES 'UTF8'",
    ];

    /**
     * @return array
     */
    public function findAllProvinces(): array
    {
        return $this->getResultFromConnection('SELECT name FROM provinz WHERE name != "?" ORDER BY name ASC;');
    }

    /**
     * group_concat(DISTINCT concat_ws('-',belegstelle.beleg,belegstelle.sammlung_id,ifnull(belegstelle.status,'status'),belegstelle.level)
     *
     * @return Inscription
     */
    public function findByUid(): Inscription
    {
        $result = [
            'inschrift_id' => 123,
            'belege' => 'V 3232-10-Leitbeleg-0#V 3232-10-Leitbeleg-0'
        ];

        $dataMapper = GeneralUtility::makeInstance(ObjectManager::class)->get(DataMapper::class);
        $mappedObjects = $dataMapper->map(Inscription::class, [$result]);

        return $mappedObjects;
    }

    /**
     * @param string $query
     * @return array
     */
    protected function getResultFromConnection(string $query): array
    {
        $services = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::findService('connector', 'sql');
        if ($services === false) {
            throw new \LogicException('No database found for connection', 1572949591);
        } else {
            $connector = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstanceService('connector', 'sql');
        }
        $connector->fetchArray($this->connection + ['query' => $query]);
    }
}
