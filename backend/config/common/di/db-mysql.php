<?php

/** @var array $params */

return [
    \Yiisoft\Db\Connection\ConnectionInterface::class => [
        'class' => \Yiisoft\Db\Mysql\Connection::class,
        '__construct()' => [
            'driver' => new \Yiisoft\Db\Mysql\Driver(
                $params['yiisoft/db-mysql']['dsn'],
                $params['yiisoft/db-mysql']['username'],
                $params['yiisoft/db-mysql']['password'],
            )
        ]
    ]
];
