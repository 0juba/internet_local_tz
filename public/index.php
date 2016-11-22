<?php

$loader = require_once __DIR__ . '/../vendor/autoload.php';

$app = new \ChessApp\App();
$app->init(require_once(__DIR__ . '/../src/App/Resources/config'));

$container = $app->getContainer();

// Создадим фигуры
$pawn = $container->get('chess_figure_service')->createWhitePawn();
$king = $container->get('chess_figure_service')->createWhiteKing();
$queen = $container->get('chess_figure_service')->createWhiteQueen();

// Получим доску
$board = $container->get('chess_board_service')->createBoard(8);

// Сохраним состояние доски
$container->get('chess_board_service')->save($board);

// Добавим фигуры на доску
$container->get('chess_figure_service')->addFigure($board, $pawn);
$container->get('chess_figure_service')->addFigure($board, $king);
$container->get('chess_figure_service')->addFigure($board, $queen);

// Сохраним состояние доски
$container->get('chess_board_service')->save($board);

// Переместим фигуры
$container->get('chess_figure_service')->moveFigure($pawn, \ChessDomain\ValueObject\Cell::create(4, 5));
$container->get('chess_figure_service')->moveFigure($king, \ChessDomain\ValueObject\Cell::create(2, 2));
$container->get('chess_figure_service')->moveFigure($queen, \ChessDomain\ValueObject\Cell::create(6, 1));

// Сохраним состояние доски
$container->get('chess_board_service')->save($board);

// Удалим фигуры с доски
$container->get('chess_figure_service')->removeFigure($pawn);
$container->get('chess_figure_service')->removeFigure($king);
$container->get('chess_figure_service')->removeFigure($queen);

// Загрузим состояние доски
$board = $container->get('chess_board_service')->load();
