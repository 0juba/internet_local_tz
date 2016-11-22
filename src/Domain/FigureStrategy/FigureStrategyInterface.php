<?php

namespace ChessDomain\FigureStrategy;

use ChessDomain\Entity\ChessFigure;
use ChessDomain\ValueObject\Cell;

interface FigureStrategyInterface 
{
    public function moveTo(ChessFigure $chessFigure, Cell $to);
    public function getName();
}
