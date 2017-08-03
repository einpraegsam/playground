<?php
namespace Group\Person\Domain\Service;

/**
 * Class BirthdateService
 */
class BirthdateService
{

    /**
     * @return bool
     */
    public function isAtLeast18(\DateTime $birthdate): bool
    {
        return $this->doIt($birthdate);
    }

    /**
     * @return bool
     */
    protected function doIt(\DateTime $birthdate): bool
    {
        return $birthdate->diff(new \DateTime())->y >= 18;
    }
}
