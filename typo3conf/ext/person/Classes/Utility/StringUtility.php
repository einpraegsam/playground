<?php
namespace Group\Person\Utility;

/**
 * Class StringUtility
 */
class StringUtility
{

    /**
     * @param string $string
     * @return string
     */
    public static function removeLastCharacter(string $string): string
    {
        return substr($string, 0, strlen($string) - 1);
    }
}
