<?php

namespace ChessDomain\Entity;

use ChessDomain\FigureStrategy\FigureStrategyInterface;
use ChessDomain\ValueObject\Cell;
use ChessDomain\ValueObject\Color;

class ChessFigure
{
    private $color;
    /** @var  Cell */
    private $position;
    /** @var  ChessBoard */
    private $chessBoard;
    /** @var  FigureStrategyInterface */
    private $movementStrategy;

    public function __construct(FigureStrategyInterface $figureStrategy, Color $color, Cell $position = null)
    {
        $this->color = $color;
        $this->position = $position;
        $this->movementStrategy = $figureStrategy;
    }

    public function moveTo(Cell $cell)
    {
        $this->movementStrategy->moveTo($this, $cell);

        $this->position = $cell;

        return $this;
    }

    public function remove()
    {
        $this->position = null;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getPosition()
    {
        return $this->position;
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
