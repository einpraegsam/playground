<?php
namespace Ukn\Person\Domain\Service;

/**
 * Class DateService
 */
class DateService
{

    /**
     * @var null|\DateTime
     */
    protected $dateOfBirth = null;

    /**
     * DateService constructor.
     *
     * @param \DateTime $dateOfBirth
     */
    public function __construct(\DateTime $dateOfBirth = null)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return bool
     */
    public function isOver30(): bool
    {
        $dateOfBirth = $this->dateOfBirth;
        if ($dateOfBirth !== null) {
            return $dateOfBirth->diff(new \DateTime())->y > 30;
        }
        return false;
    }
}
