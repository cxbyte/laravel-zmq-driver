<?php

namespace Cxbyte\ZmqDriver;

use Illuminate\Broadcasting\BroadcastManager;

/**
 * Zmq broadcast manager
 *
 * @category Laravel
 *
 * @package Cxbyte\ZmqDriver
 *
 * @author Andrey Petrov <cxbyte@mail.ru>
 *
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 * @link https://github.com/cxbyte/zmqdriver
 */
class ZmqBroadcastManager extends BroadcastManager
{
    /**
     * Create Zmq driver
     *
     * @param array $config config
     *
     * @return ZmqBroadcaster
     */
    public function createZmqDriver(array $config)
    {
        $socket = (new \ZMQContext())->getSocket(\ZMQ::SOCKET_PUB);

        return new ZmqBroadcaster($socket, $config['port']);
    }
}
