<?php

namespace ChessDomain\FigureStrategy;

use ChessDomain\Entity\ChessBoard;
use ChessDomain\ValueObject\Cell;

interface FigureStrategyInterface 
{
    public function moveTo(ChessBoard $chessBoard, Cell $to);
    public function getName();
}
