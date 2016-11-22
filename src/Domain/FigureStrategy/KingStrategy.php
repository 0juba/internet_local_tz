<?php

namespace ChessDomain\FigureStrategy;

use ChessDomain\Entity\ChessBoard;
use ChessDomain\Entity\ChessFigure;
use ChessDomain\ValueObject\Cell;

class KingStrategy implements FigureStrategyInterface 
{
    public function moveTo(ChessBoard $chessBoard, ChessFigure $figure, Cell $to)
    {
        // TODO: Implement moveTo() method.
    }

    public function getName()
    {
        return 'king';
    }
}
