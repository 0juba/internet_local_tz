<?php

namespace ChessDomain\Entity;

use ChessDomain\ValueObject\Cell;
use ChessDomain\ValueObject\Color;

class ChessFigure
{
    private $color;
    /** @var  Cell */
    private $cell;
    /** @var  ChessBoard */
    private $chessBoard;

    public function __construct(Color $color, Cell $cell = null)
    {
        $this->color = $color;
        $this->cell = $cell;
    }

    public function moveTo(Cell $cell)
    {
        $this->cell = $cell;

        return $this;
    }

    public function remove()
    {
        $this->cell = null;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getCell()
    {
        return $this->cell;
    }

    public function getChessBoard()
    {
        return $this->chessBoard;
    }

    public function setChessBoard(ChessBoard $chessBoard)
    {
        $this->chessBoard = $chessBoard;

        return $this;
    }

    public function isBelongsToBoard(ChessBoard $chessBoard)
    {
        return $this->chessBoard === $chessBoard;
    }

    public function isPlaced()
    {
        return null !== $this->chessBoard;
    }
}
