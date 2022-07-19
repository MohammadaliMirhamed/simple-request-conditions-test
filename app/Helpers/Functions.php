<?php
namespace App\Helpers;

class Functions
{
    /**
     * detect if the given string has emoji
     *
     * @param  string $message
     * @return bool
     */
    static function isStringHasEmojis($string) :bool
    {
        $emojis_regex =
            '/[\x{0080}-\x{02AF}'
            .'\x{0300}-\x{03FF}'
            .'\x{0600}-\x{06FF}'
            .'\x{0C00}-\x{0C7F}'
            .'\x{1DC0}-\x{1DFF}'
            .'\x{1E00}-\x{1EFF}'
            .'\x{2000}-\x{209F}'
            .'\x{20D0}-\x{214F}'
            .'\x{2190}-\x{23FF}'
            .'\x{2460}-\x{25FF}'
            .'\x{2600}-\x{27EF}'
            .'\x{2900}-\x{29FF}'
            .'\x{2B00}-\x{2BFF}'
            .'\x{2C60}-\x{2C7F}'
            .'\x{2E00}-\x{2E7F}'
            .'\x{3000}-\x{303F}'
            .'\x{A490}-\x{A4CF}'
            .'\x{E000}-\x{F8FF}'
            .'\x{FE00}-\x{FE0F}'
            .'\x{FE30}-\x{FE4F}'
            .'\x{1F000}-\x{1F02F}'
            .'\x{1F0A0}-\x{1F0FF}'
            .'\x{1F100}-\x{1F64F}'
            .'\x{1F680}-\x{1F6FF}'
            .'\x{1F910}-\x{1F96B}'
            .'\x{1F980}-\x{1F9E0}]/u';
        preg_match($emojis_regex, $string, $matches);
        return !empty($matches);
    }
}