<?php

return array(
    'chess_board_service'  => function (Container $container, $serviceId) {
        $boardService = new \ChessDomain\Service\ChessBoardService($container->get('storage'));
        $container->addService($serviceId, $boardService);

        return $boardService;
    },
    'chess_figure_service' => function (Container $container, $serviceId) {
        $figureService = new \ChessDomain\Service\ChessFigureService($container->get('chess_notifier'));
        $container->addService($serviceId, $figureService);

        return $figureService;
    },
    'chess_notifier'       => function (Container $container, $serviceId) {
        $notifier = new ChessDomain\Notifier\Notifier();
        $container->addService($serviceId, $notifier);

        $notifier->addListener(ChessDomain\Notifier\Events::ANY_FIGURE_ADDED, new \ChessApp\Listener\AnyFigureListener());
        $notifier->addListener(ChessDomain\Notifier\Events::PAWN_ADDED, new \ChessApp\Listener\PawnListener());

        return $notifier;
    },
    'file_storage'         => function (Container $container, $serviceId) {
        $fileStorage = new \ChessApp\Storage\FileStorage();
        $container->addService($serviceId, $fileStorage);

        return $fileStorage;
    },
    'redis_storage'        => function (Container $container, $serviceId) {
        $redisStorage = new \ChessApp\Storage\RedisStorage();
        $container->addService($serviceId, $redisStorage);

        return $redisStorage;
    },
    'storage'              => function (Container $container, $serviceId) {
        // Storage service
        $container->addService($serviceId, $container->get('file_storage'));

        return $container->get('file_storage');
    }
);
