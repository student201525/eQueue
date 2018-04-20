<?php
/**
 * Created by PhpStorm.
 * User: fitchu
 * Date: 27.03.18
 * Time: 20:30
 */

use Ratchet\Server\IoServer;
use app\controllers\socketController;

    require dirname(__DIR__) . '/vendor/autoload.php';
    $server = IoServer::factory(new socketController(),8080);
    $server->run();