<?php

namespace Cxbyte\ZmqDriver\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Cxbyte\ZmqDriver\Contracts\ShouldPayload;

/**
 * Broadcasting event
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
abstract class AbstractEvent implements ShouldBroadcast, ShouldPayload
{
    protected $payload;

    /**
     * Event constructor
     *
     * @param mixed $message message
     */
    public function __construct($message = [])
    {
        $this->payload['message'] = $message;
    }

    /**
     * @inheritdoc
     */
    abstract public function broadcastOn();

    /**
     * @inheritdoc
     */
    public function broadcastWith()
    {
        return $this->payload;
    }
}
