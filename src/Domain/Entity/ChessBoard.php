<?php

namespace ChessDomain\Entity;

use ChessDomain\ValueObject\Cell;

class ChessBoard
{
    private $size;
    private $cells;

    public function __construct($size)
    {
        $this->size = $size;
        $this->cells = array();
    }

    public function add(ChessFigure $figure)
    {
        if ($figure->isPlaced()) {
            if (!$figure->isBelongsToBoard($this)) {
                throw new \LogicException('Figure belongs to another board.');
            }

            throw new \LogicException('Figure already placed on the board.');
        }

        $y = 0;
        for ($x = 0; $x < $this->size; $x++) {
            for ($y = 0; $y < $this->size; $y++) {
                if (empty($this->cells[$x][$y])) {
                    break 2;
                }
            }
        }

        if ($x === $this->size && $y === $this->size) {
            throw new \LogicException('The board is already full.');
        }

        $this->cells[$x][$y] = $figure;

        return $this;
    }

    public function remove(Cell $cell)
    {
        unset($this->cells[$cell    ->getX()][$cell->getY()]);

        return $this;
    }
}
