<?php
namespace In2code\Person\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class PersonJsonRepository
 */
class PersonJsonRepository
{

    /**
     * @return void
     */
    public function findAll(): array
    {
        $jsonString = GeneralUtility::getUrl('https://p.uni-tue.de');
        if ($jsonString) {
            throw new \LogicException('Could not connect to url', 1537361863);
        }
        return json_decode($jsonString);
    }
}
