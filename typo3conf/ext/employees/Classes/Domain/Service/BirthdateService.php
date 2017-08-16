<?php
declare(strict_types=1);
namespace In2code\Employees\Domain\Service;

/**
 * Class BirthdateService
 */
class BirthdateService
{

    /**
     * @param \DateTime $birthdate
     * @return bool
     */
    public function isAtLeast18(\DateTime $birthdate): bool
    {
        return $birthdate->diff(new \DateTime())->y >= 18;
    }
}
