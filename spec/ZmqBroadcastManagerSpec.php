<?php

namespace spec\Cxbyte\ZmqDriver;

use Cxbyte\ZmqDriver\ZmqBroadcastManager;
use PhpSpec\Laravel\LaravelObjectBehavior;
use Cxbyte\ZmqDriver\ZmqDriverServiceProvider;

/**
 * @mixin ZmqBroadcastManager
 */
class ZmqBroadcastManagerSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(app());
        $this->shouldHaveType(ZmqBroadcastManager::class);
        $this->createZmqDriver(['port' => 5555]);
    }
}
