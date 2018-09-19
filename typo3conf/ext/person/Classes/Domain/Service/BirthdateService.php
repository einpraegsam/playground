<?php
namespace In2code\Person\Domain\Service;

/**
 * Class BirthdateService
 */
class BirthdateService
{

    /**
     * @return bool
     */
    public function isOver18(\DateTime $birthdate): bool
    {
        return $birthdate->diff(new \DateTime())->y >= 18;
    }
}
