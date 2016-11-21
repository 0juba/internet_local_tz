<?php

namespace ChessDomain\Entity;

use ChessDomain\FigureStrategy\FigureStrategyInterface;
use ChessDomain\ValueObject\Cell;
use ChessDomain\ValueObject\Color;

class ChessFigure
{
    private $color;
    /** @var  Cell */
    private $cell;
    /** @var  ChessBoard */
    private $chessBoard;
    /** @var  FigureStrategyInterface */
    private $movementStrategy;

    public function __construct(FigureStrategyInterface $figureStrategy, Color $color, Cell $cell = null)
    {
        $this->color = $color;
        $this->cell = $cell;
        $this->movementStrategy = $figureStrategy;
    }

    public function moveTo(Cell $cell)
    {
        $this->movementStrategy->moveTo($cell);

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

    public function getMovementStrategy()
    {
        return $this->movementStrategy;
    }

    public function getType()
    {
        if ($this->movementStrategy) {
            return $this->movementStrategy->getName();
        }

        throw new \LogicException('Movement strategy should be set.');
    }
}
