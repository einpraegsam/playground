<?php
namespace In2code\Persons\Utility;

/**
 * Class StringUtility
 */
class StringUtility
{

    /**
     * @param string $string
     * @return string
     */
    public static function firstLetterUpper(string $string): string
    {
        return ucfirst($string);
    }
}
