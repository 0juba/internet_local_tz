<?php

namespace ChessDomain\Service;

use ChessDomain\Entity\ChessBoard;
use ChessDomain\Entity\ChessFigure;
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

        $this->notifier->fire(Events::ANY_FIGURE_ADDED, new Event($chessBoard, $figure));
        $this->notifier->fire(Events::getFromFigure($figure), new Event($chessBoard, $figure));
    }

    public function moveFigure(ChessBoard $chessBoard, ChessFigure $figure, Cell $to)
    {
        $chessBoard->moveTo($figure, $figure->getCell(), $to);
        $figure->moveTo($to);
    }

    public function removeFigure(ChessBoard $chessBoard, ChessFigure $figure)
    {
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
