<?php

namespace ChessDomain\Notifier;

use ChessDomain\Entity\ChessBoard;
use ChessDomain\Entity\ChessFigure;

class Event
{
    private $board;
    private $figure;

    public function __construct(ChessBoard $chessBoard, ChessFigure $figure)
    {
        $this->board = $chessBoard;
        $this->figure = $figure;
    }

    public function getBoard()
    {
        return $this->board;
    }

    public function getFigure()
    {
        return $this->figure;
    }
}
