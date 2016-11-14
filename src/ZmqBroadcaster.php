<?php

namespace Cxbyte\ZmqDriver;

use Illuminate\Broadcasting\Broadcasters\Broadcaster;

/**
 * Zmq Broadcaster
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
class ZmqBroadcaster extends Broadcaster
{
    protected $socket;
    protected $port;

    /**
     * Zmq Broadcaster
     *
     * @param \ZMQSocket $socket zmq socket instance
     * @param int        $port   port
     */
    public function __construct(\ZMQSocket $socket, $port)
    {
        $this->socket = $socket;
        $this->port = $port;
    }

    /**
     * Auth
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return $this
     */
    public function auth($request)
    {
        return $this;
    }

    /**
     * ValidAuthenticationResponse
     *
     * @param \Illuminate\Http\Request $request request
     * @param mixed                    $result  result
     *
     * @return $this
     */
    public function validAuthenticationResponse($request, $result)
    {
        return $this;
    }

    /**
     * Broadcast message
     *
     * @param array  $channels channels of broadcasting
     * @param string $event    broadcasting event
     * @param array  $payload  payload
     *
     * @return void
     */
    public function broadcast(array $channels, $event, array $payload = [])
    {
        $this->socket->bind(sprintf("tcp://*:%d", $this->port));

        usleep(250000);

        $message = isset($payload['message']) ? $payload['message'] : null;

        foreach ($this->formatChannels($channels) as $channel) {
            $this->socket->sendmulti([$channel, json_encode($message)]);
        }
    }
}