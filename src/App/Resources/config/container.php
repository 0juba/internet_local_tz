<?php

return array(
    'chess_board_service'  => function (ChessApp\Container\Container $container, $serviceId) {
        $boardService = new \ChessDomain\Service\ChessBoardService($container->get('storage'));
        $container->addService($serviceId, $boardService);

        return $boardService;
    },
    'chess_figure_service' => function (ChessApp\Container\Container $container, $serviceId) {
        $figureService = new \ChessDomain\Service\ChessFigureService($container->get('chess_notifier'));
        $container->addService($serviceId, $figureService);

        return $figureService;
    },
    'chess_notifier'       => function (ChessApp\Container\Container $container, $serviceId) {
        $notifier = new ChessDomain\Notifier\Notifier();
        $container->addService($serviceId, $notifier);

        $notifier->addListener(ChessDomain\Notifier\Events::ANY_FIGURE_ADDED, new \ChessApp\Listener\AnyFigureListener());
        $notifier->addListener(ChessDomain\Notifier\Events::PAWN_ADDED, new \ChessApp\Listener\PawnListener());

        return $notifier;
    },
    'file_storage'         => function (ChessApp\Container\Container $container, $serviceId) {
        $fileStorage = new \ChessApp\Storage\FileStorage('/tmp/chess_board.txt');
        $container->addService($serviceId, $fileStorage);

        return $fileStorage;
    },
    'redis_storage'        => function (ChessApp\Container\Container $container, $serviceId) {
        $redisStorage = new \ChessApp\Storage\RedisStorage('192.168.0.100');
        $container->addService($serviceId, $redisStorage);

        return $redisStorage;
    },
    'storage'              => function (ChessApp\Container\Container $container, $serviceId) {
        // Storage service
        $container->addService($serviceId, $container->get('file_storage'));

        return $container->get('file_storage');
    }
);
