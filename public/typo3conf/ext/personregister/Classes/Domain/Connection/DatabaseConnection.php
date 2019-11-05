<?php
declare(strict_types=1);
namespace In2code\Personregister\Domain\Repository;

use Doctrine\DBAL\Driver\Mysqli\MysqliConnection;

/**
 * Class PersonRepository
 */
class DatabaseConnection
{
    public function build()
    {
        return new MysqliConnection();
    }
}
