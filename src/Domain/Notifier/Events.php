<?php

namespace ChessDomain\Notifier;

use ChessDomain\Entity\ChessFigure;

class Events
{
    const ANY_FIGURE_ADDED = 'any_figure_added';
    const PAWN_ADDED = 'pawn_added';
    const KING_ADDED = 'king_added';
    const QUEEN_ADDED = 'queen_added';

    private function __construct()
    {
    }

    public static function getFromFigure(ChessFigure $figure)
    {
        return sprintf('%s_added', strtolower($figure->getType()));
    }
}
