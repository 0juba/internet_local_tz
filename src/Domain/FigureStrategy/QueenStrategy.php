<?php

namespace ChessDomain\FigureStrategy;

use ChessDomain\Entity\ChessFigure;
use ChessDomain\ValueObject\Cell;

class QueenStrategy implements FigureStrategyInterface
{
    public function moveTo(ChessFigure $chessFigure, Cell $to)
    {
        // TODO: Implement moveTo() method.
    }

    public function getName()
    {
        return 'queen';
    }
}
