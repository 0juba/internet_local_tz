<?php

namespace ChessDomain\Service;

use ChessDomain\Entity\ChessFigure;
use ChessDomain\Entity\ChessBoard;
use ChessDomain\Factory\ChessFigureFactory;
use ChessDomain\Notifier\Event;
use ChessDomain\Notifier\Events;
use ChessDomain\Notifier\NotifierInterface;
use ChessDomain\ValueObject\Cell;

class ChessFigureService
{
    /** @var  NotifierInterface */
    private $notifier;

    public function __construct(NotifierInterface $notifier)
    {
        $this->notifier = $notifier;
    }

    public function addFigure(ChessBoard $chessBoard, ChessFigure $figure)
    {
        $chessBoard->add($figure);

        $this->notifier->notify(Events::ANY_FIGURE_ADDED, new Event($chessBoard, $figure));
        $this->notifier->notify(Events::getFromFigure($figure), new Event($chessBoard, $figure));
    }

    public function moveFigure(ChessFigure $figure, Cell $to)
    {
        if (!$figure->isPlaced()) {
            throw new \LogicException('Figure does not belong to any board.');
        }

        $chessBoard = $figure->getChessBoard();

        $chessBoard->moveTo($figure, $figure->getPosition(), $to);
        $figure->moveTo($to);
    }

    public function removeFigure(ChessFigure $figure)
    {
        if (!$figure->isPlaced()) {
            throw new \LogicException('Figure does not belong to any board.');
        }

        $chessBoard = $figure->getChessBoard();

        $chessBoard->remove($figure);
        $figure->remove();
    }

    function __call($name, $arguments)
    {
        if (false === strpos($name, 'create')) {
            throw new \BadMethodCallException('Unknown method.');
        }

        return ChessFigureFactory::$name($arguments);
    }
}
