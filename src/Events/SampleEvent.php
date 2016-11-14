<?php

namespace Cxbyte\ZmqDriver\Events;

use Illuminate\Broadcasting\Channel;

/**
 * Sample event
 *
 * @category Laravel
 *
 * @package Cxbyte\ZmqDriver\Events
 *
 * @author Andrey Petrov <cxbyte@mail.ru>
 *
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 * @link https://github.com/cxbyte/zmqdriver
 */
class SampleEvent extends AbstractEvent
{
    /**
     * @inheritdoc
     */
    public function broadcastOn()
    {
        return new Channel('items');
    }
}
