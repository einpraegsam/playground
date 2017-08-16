<?php
declare(strict_types=1);
namespace In2code\Employees\Utility;

/**
 * Class StringUtility
 */
class StringUtility
{

    /**
     * @param string $string
     * @return string
     */
    public static function firstCharacterUppercase(string $string): string
    {
        return ucfirst($string);
    }
}
