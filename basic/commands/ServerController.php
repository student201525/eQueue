<?php
/**
 * Created by PhpStorm.
 * User: fitchu
 * Date: 27.03.18
 * Time: 19:19
 */

namespace app\commands;
use app\controllers\socketController;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;


require dirname(__DIR__) . '/vendor/autoload.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new socketController()
        )
    ),
    8080);

$server->run();