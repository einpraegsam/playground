<?php
declare(strict_types=1);
namespace In2code\Persons\Domain\Service;

use In2code\Persons\Domain\Model\Person;

/**
 * Class AdultService
 */
class AdultService
{

    /**
     * @return bool
     */
    public function isOver18(Person $person): bool
    {
        $birthdate = $person->getBirthDate();
        if ($birthdate !== null) {
            return $this->isDateOlderThan18($birthdate);
        }
        return false;
    }

    /**
     * @param \DateTime $date
     * @return bool
     */
    protected function isDateOlderThan18(\DateTime $date): bool
    {
        return $date->diff(new \DateTime())->y >= 18;
    }
}
