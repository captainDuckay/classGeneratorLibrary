<?php

declare(strict_types=1);

/**
 * Class testClass
 * @package /
 */
class testClass
{
    public function publicNonStaticMethod(): void
    {
        $public = 10;
        $public++;
        die($public);
    }

    public static function publicStaticMethod(): string
    {
    }

}