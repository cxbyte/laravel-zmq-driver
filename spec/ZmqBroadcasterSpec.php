<?php

namespace spec\Cxbyte\ZmqDriver;

use Cxbyte\ZmqDriver\ZmqBroadcaster;
use PhpSpec\Laravel\LaravelObjectBehavior;

/**
 * @mixin ZmqBroadcaster
 */
class ZmqBroadcasterSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(
            (new \ZMQContext())->getSocket(\ZMQ::SOCKET_PUB),
            5555
        );
        $this->shouldHaveType(ZmqBroadcaster::class);
    }
}
