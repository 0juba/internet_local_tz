<?php

namespace ChessDomain\Factory;

use ChessDomain\Entity\ChessFigure;
use ChessDomain\ValueObject\Color;

/**
 * Supported methods:
 *
 *      - createWhitePawn
 *      - createBlackPawn
 *      - createWhiteKing
 *      - createBlackKing
 *      - createWhiteQueen
 *      - createBlackQueen
 */
class ChessFigureFactory
{
    public static function __callStatic($name, $arguments)
    {
        if (false === strpos($name, 'create')) {
            throw new \BadMethodCallException('Unsupported action.');
        }

        $parts = array();
        if (!preg_match('/^(create)(white|black)([a-z]+)$/ium', $name, $parts)) {
            throw new \BadMethodCallException('Unsupported action.');
        }

        // Color
        $color = null;
        switch (strtolower($parts[2])) {
            case Color::COLOR_BLACK:
                $color = Color::createBlack();

                break;
            case Color::COLOR_WHITE:
                $color = Color::createWhite();

                break;
        }

        $strategyClassname = 'ChessDomain\\FigureStrategy\\' . ucfirst(strtolower($parts[3]));
        if (!class_exists($strategyClassname)) {
            throw new \BadMethodCallException('Unknown figure strategy.');
        }

        return new ChessFigure(new $strategyClassname, $color);
    }
}
