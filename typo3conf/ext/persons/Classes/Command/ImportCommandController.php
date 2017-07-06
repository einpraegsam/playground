<?php
namespace In2code\Persons\Command;

use In2code\Persons\Domain\Model\Person;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\CommandController;

/**
 * Class ImportCommandController
 */
class ImportCommandController extends CommandController
{
    /**
     * @var \In2code\Persons\Domain\Repository\PersonRepository
     * @inject
     */
    protected $personRepository = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     * @inject
     */
    protected $persistenceManager;

    /**
     * Import persons
     *       Try to import persons from JSON
     *
     * @param string $jsonUrl From which url should we import?
     * @param bool $delete Truncate persons table?
     * @param int $pid Where to save?
     * @return void
     */
    public function importPersonsCommand(
        string $jsonUrl = 'https://www.in2code.de/fileadmin/user_upload/test.json',
        bool $delete = false,
        int $pid = 3
    ) {
        $this->truncateTable($delete);
        $this->importPersonsFromJson($jsonUrl, $pid);
    }

    /**
     * @param bool $delete
     * @return void
     */
    protected function truncateTable(bool $delete)
    {
        if ($delete === true) {
            $GLOBALS['TYPO3_DB']->exec_TRUNCATEquery(Person::TABLE_NAME);
        }
    }

    /**
     * @param string $jsonUrl
     * @param int $pid
     * @return void
     */
    protected function importPersonsFromJson(string $jsonUrl, int $pid)
    {
        $json = GeneralUtility::getUrl($jsonUrl);
        $rows = json_decode($json, true);
        foreach ($rows as $row) {
            $person = GeneralUtility::makeInstance(Person::class);
            $person
                ->setFirstName($row['firstname'])
                ->setLastName($row['name'])
                ->setPid($pid);
            $this->personRepository->add($person);
        }
        $this->persistenceManager->persistAll();
        $this->outputLine(count($rows) . ' Persons imported - have a nice day!');
    }
}
