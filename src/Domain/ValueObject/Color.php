<?php

namespace ChessDomain\ValueObject;

use ChessDomain\Entity\ChessFigure;

class Color
{
    const COLOR_BLACK = 'black';
    const COLOR_WHITE = 'white';

    private $value;

    public static function createBlack()
    {
        return new static(self::COLOR_BLACK);
    }

    public static function createWhite()
    {
        return new static(self::COLOR_WHITE);
    }

    private function __construct($color)
    {
        $this->value = $color;
    }
}
